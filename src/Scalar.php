<?php

declare(strict_types=1);

namespace Scalar;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Scalar\Exceptions\MissingOpenApiDocument;

class Scalar
{
    public static function pageTitle(): string
    {
        $title = config('scalar.configuration.metaData.title');

        if (is_string($title)) {
            return $title;
        }

        $name = config('app.name');

        return (is_string($name) ? $name : 'Laravel').' API Reference';
    }

    public static function url(): ?string
    {
        $url = config('scalar.url');

        return is_string($url) && $url !== '' ? $url : null;
    }

    public static function content(): ?string
    {
        /** A local file is read on the server and embedded in the page. */
        $file = config('scalar.file');

        if (is_string($file) && $file !== '') {
            if (! is_file($file)) {
                throw new MissingOpenApiDocument(
                    "The configured OpenAPI document could not be found at: {$file}"
                );
            }

            return File::get($file);
        }

        /** Otherwise, use the inline content as-is. */
        $content = config('scalar.content');

        return is_string($content) && $content !== '' ? $content : null;
    }

    public static function cdn(): string
    {
        $cdn = config('scalar.cdn');

        return is_string($cdn) ? $cdn : 'https://cdn.jsdelivr.net/npm/@scalar/api-reference';
    }

    /**
     * @return Collection<array-key, mixed>
     */
    public static function configuration(): Collection
    {
        $configuration = config('scalar.configuration');
        $configuration = is_array($configuration) ? $configuration : [];

        /** Don’t add a theme if `laravel` is selected */
        $theme = ($configuration['theme'] ?? null) === 'laravel'
            ? 'none'
            : ($configuration['theme'] ?? null);

        /** Add Laravel integration identifier */
        $configuration['_integration'] ??= 'laravel';

        /** Resolve the OpenAPI document: inline content takes precedence over a URL. */
        $content = self::content();
        $url = self::url();

        if ($content === null && $url === null) {
            throw new MissingOpenApiDocument(
                'No OpenAPI document configured. Set the `url`, `content`, or `file` option in config/scalar.php.'
            );
        }

        /** Render as JSON */
        return collect($configuration)->merge([
            'theme' => $theme,
        ])->merge(
            $content !== null ? ['content' => $content] : ['url' => $url]
        );
    }
}
