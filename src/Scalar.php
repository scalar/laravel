<?php

declare(strict_types=1);

namespace Scalar;

use Illuminate\Support\Collection;

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

        return is_string($url) ? $url : null;
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

        /** Render as JSON */
        return collect($configuration)->merge([
            'theme' => $theme,
            'url' => config('scalar.url'),
        ]);
    }
}
