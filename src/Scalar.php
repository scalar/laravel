<?php

namespace Scalar;

class Scalar
{
    public static function pageTitle()
    {
        return config(
            'scalar.configuration.metaData.title',
            config('app.name').' API Reference'
        );
    }

    public static function url()
    {
        return config('scalar.url');
    }

    public static function cdn()
    {
        return config('scalar.cdn', 'https://cdn.jsdelivr.net/npm/@scalar/api-reference');
    }

    public static function configuration()
    {
        /** Get the Scalar API Reference configuration */
        $configuration = config('scalar.configuration');

        /** Don’t add a theme if `laravel` is selected */
        $theme = config('scalar.configuration.theme') === 'laravel' ?
            'none' :
            config('scalar.configuration.theme');

        /** Add Laravel integration identifier */
        $configuration['_integration'] = isset($configuration['_integration']) ? $configuration['_integration'] : 'laravel';

        /** Render as JSON */
        return collect($configuration)->merge([
            'theme' => $theme,
            'url' => config('scalar.url'),
        ]);
    }
}
