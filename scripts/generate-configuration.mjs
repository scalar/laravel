import { readFileSync, writeFileSync } from 'node:fs';
import { apiReferenceConfigurationSchema } from '@scalar/schemas/api-reference';
import { applicationTitle, defaults, descriptions, examples } from './configuration-values.mjs';

const documentKeys = new Set(['_integration', 'content', 'default', 'file', 'sources', 'spec', 'url']);
const indent = '    ';

// Undefined means this branch has no PHP example that can be passed as JSON.
function schemaExample(schema, resolving = new Set()) {
    switch (schema.type) {
        case 'optional':
        case 'evaluate':
            return schemaExample(schema.schema, resolving);
        case 'union':
            for (const part of schema.schemas) {
                const example = schemaExample(part, resolving);
                if (example !== undefined) {
                    return example;
                }
            }
            return;
        case 'array':
            if (schemaExample(schema.items, resolving) !== undefined) {
                return [];
            }
            return;
        case 'record': {
            const value = schemaExample(schema.value, resolving);
            if (value !== undefined) {
                const key = schema.key.type === 'number' ? '1' : 'key';
                return { [key]: value };
            }
            return;
        }
        case 'object': {
            const entries = [];
            const optionalEntries = [];
            for (const [key, field] of Object.entries(schema.properties)) {
                const example = schemaExample(field, resolving);
                if (field.type === 'optional') {
                    if (example !== undefined) {
                        optionalEntries.push([key, example]);
                    }
                } else if (example === undefined) {
                    return;
                } else {
                    entries.push([key, example]);
                }
            }
            return Object.fromEntries(entries.length ? entries : optionalEntries.slice(0, 1));
        }
        case 'intersection': {
            const parts = schema.schemas.map((part) => schemaExample(part, resolving));
            if (parts.every((part) => part !== null && typeof part === 'object' && !Array.isArray(part))) {
                return Object.assign({}, ...parts);
            }
            return;
        }
        case 'lazy':
            // Stop walking recursive types once the same factory appears again.
            if (!resolving.has(schema.schema)) {
                return schemaExample(schema.schema(), new Set(resolving).add(schema.schema));
            }
            return null;
        case 'literal':
            return typeof schema.value === 'bigint' ? undefined : schema.value;
        case 'boolean':
            return !(schema.default ?? false);
        case 'number':
            return schema.default ?? 0;
        case 'string':
            return schema.default ?? '';
        case 'nullable':
        case 'any':
        case 'unknown':
            return null;
        case 'function':
        case 'notDefined':
            return;
        default:
            throw new Error(`Unsupported Scalar schema type: ${schema.type}`);
    }
}

function properties(schema) {
    if (schema.type === 'intersection') {
        return Object.assign({}, ...schema.schemas.map(properties));
    }
    if (schema.type === 'object') {
        return schema.properties;
    }
    throw new Error(`Expected a Scalar configuration object, got ${schema.type}`);
}

function phpValue(value, depth = 0) {
    if (value === applicationTitle) {
        return "config('app.name').' API Reference'";
    }
    if (typeof value === 'string') {
        return "'" + value.replaceAll('\\', '\\\\').replaceAll("'", "\\'") + "'";
    }
    if (value === null || typeof value !== 'object') {
        return JSON.stringify(value);
    }

    const isList = Array.isArray(value);
    const entries = isList
        ? value.map((item) => phpValue(item, depth + 1))
        : Object.entries(value).map(([key, item]) => `${phpValue(key)} => ${phpValue(item, depth + 1)}`);
    if (!entries.length) {
        return isList ? '[]' : '(object) []';
    }

    return ['[', ...entries.map((entry) => `${indent.repeat(depth + 1)}${entry},`), `${indent.repeat(depth)}]`].join('\n');
}

function safeComment(text) {
    // PHP recognizes its closing tag even in a single-line comment.
    return text.replaceAll('?>', '? >').replace(/[\r\n\u2028\u2029]/g, ' ');
}

function wrapDescription(text) {
    const words = safeComment(text).replace(/`([^`]+)`/g, "'$1'").trim().split(/\s+/);
    const lines = [];
    let line = '';
    for (const word of words) {
        if (line.length && line.length + word.length + 1 > 84) {
            lines.push(line);
            line = '';
        }
        line = line ? `${line} ${word}` : word;
    }
    return [...lines, line].filter(Boolean);
}

const optionSchemas = properties(apiReferenceConfigurationSchema);
const keys = [
    ...Object.keys(defaults),
    ...Object.keys(optionSchemas).filter((key) => !documentKeys.has(key) && !Object.hasOwn(defaults, key)).sort(),
];
const entries = [];

for (const key of keys) {
    const schema = optionSchemas[key];
    const active = Object.hasOwn(defaults, key);
    const schemaDescription = schema?.typeComment ?? schema?.schema?.typeComment;
    if (!active && schemaDescription?.includes('@deprecated')) {
        continue;
    }

    const value = active ? defaults[key] : schemaExample(schema);
    if (value === undefined) {
        continue;
    }

    const description = descriptions[key] ?? schemaDescription;
    const notes = description ? wrapDescription(description).map((line) => `// ${line}`) : [];
    const displayValue = !active && Object.hasOwn(examples, key) ? examples[key] : value;
    const assignment = `${phpValue(key)} => ${phpValue(displayValue)},`.split('\n');
    const valueLines = active ? assignment : assignment.map((line) => `// ${safeComment(line)}`);
    entries.push([...notes, ...valueLines].map((line) => indent.repeat(2) + line).join('\n'));
}

const configPath = new URL('../config/scalar.php', import.meta.url);
const config = readFileSync(configPath, 'utf8');
const configurationBlock = /^    'configuration' => \[\r?\n[\s\S]*?^    \],/m;
if (!configurationBlock.test(config)) {
    throw new Error('Could not find the configuration array in config/scalar.php.');
}
const generated = ["    'configuration' => [", entries.join('\n\n'), '    ],'].join('\n');
const newline = config.includes('\r\n') ? '\r\n' : '\n';
writeFileSync(configPath, config.replace(configurationBlock, () => generated.replaceAll('\n', newline)));
