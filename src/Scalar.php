<?php

declare(strict_types=1);

namespace Scalar;

use Illuminate\Support\Collection;
use Scalar\Exceptions\MissingOpenApiDocument;

class Scalar
{
    /**
     * Documents registered programmatically.
     *
     * @var array<int, Document>
     */
    protected array $documents = [];

    public function document(?string $title = null): Document
    {
        $document = new Document;

        if ($title !== null) {
            $document->title($title);
        }

        $this->documents[] = $document;

        return $document;
    }

    /**
     * Forget all programmatically registered documents.
     *
     * The manager is a long-lived singleton, so under Laravel Octane you should
     * register documents once (in a service provider) or flush them yourself if
     * you register per request.
     */
    public function flush(): void
    {
        $this->documents = [];
    }

    /**
     * Resolve the documents to render: registered documents first, then the
     * `sources` config, otherwise fall back to a single-document setup.
     *
     * @return array<array-key, Document>
     */
    public function documents(): array
    {
        if ($this->documents !== []) {
            return $this->documents;
        }

        $sources = config('scalar.sources');

        if (is_array($sources) && $sources !== []) {
            return array_map(
                fn (mixed $source): Document => Document::fromArray(is_array($source) ? $source : []),
                $sources
            );
        }

        return [];
    }

    public function pageTitle(): string
    {
        $title = config('scalar.configuration.metaData.title');

        if (is_string($title)) {
            return $title;
        }

        $name = config('app.name');

        return (is_string($name) ? $name : 'Laravel').' API Reference';
    }

    public function url(): ?string
    {
        $url = config('scalar.url');

        return is_string($url) && $url !== '' ? $url : null;
    }

    public function content(): ?string
    {
        /** A local file is read on the server and embedded in the page. */
        $file = config('scalar.file');

        if (is_string($file) && $file !== '') {
            return Document::readFile($file);
        }

        /** Otherwise, use the inline content as-is. */
        $content = config('scalar.content');

        return is_string($content) && $content !== '' ? $content : null;
    }

    public function cdn(): string
    {
        $cdn = config('scalar.cdn');

        return is_string($cdn) ? $cdn : 'https://cdn.jsdelivr.net/npm/@scalar/api-reference';
    }

    /**
     * @return Collection<array-key, mixed>
     */
    public function configuration(): Collection
    {
        $configuration = config('scalar.configuration');
        $configuration = is_array($configuration) ? $configuration : [];

        /** Don’t add a theme if `laravel` is selected */
        $theme = ($configuration['theme'] ?? null) === 'laravel'
            ? 'none'
            : ($configuration['theme'] ?? null);

        /** Add Laravel integration identifier */
        $configuration['_integration'] ??= 'laravel';

        $base = collect($configuration)->merge(['theme' => $theme]);

        /** Multiple/versioned documents render through a `sources` array. */
        $documents = $this->documents();

        if ($documents !== []) {
            return $base->merge([
                'sources' => array_map(fn (Document $document): array => $document->toArray(), $documents),
            ]);
        }

        /** Otherwise, fall back to a single document: content takes precedence over a URL. */
        $content = $this->content();
        $url = $this->url();

        if ($content === null && $url === null) {
            throw new MissingOpenApiDocument(
                'No OpenAPI document configured. Set the `url`, `content`, `file`, or `sources` option in config/scalar.php.'
            );
        }

        return $base->merge(
            $content !== null ? ['content' => $content] : ['url' => $url]
        );
    }
}
