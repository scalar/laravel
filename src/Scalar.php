<?php

namespace Scalar\Scalar;

class Scalar
{
    public static function url()
    {
        return config('scalar.url');
    }

    public static function configurationJson()
    {
        /** Get the Scalar API Reference configuration */
        $configuration = config('scalar.configuration');

        /** Don’t add a theme if `laravel` is selected */
        $theme = config('scalar.configuration.theme') === 'laravel' ?
            'none' :
            config('scalar.configuration.theme');

        /** Render as JSON */
        return json_encode(
            array_merge($configuration, [
                'theme' => $theme,
            ]),
        );
    }
}
