<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Scalar Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where Scalar will be accessible from. If this
    | setting is null, Scalar will reside under the same domain as the
    | application. Otherwise, this value will serve as the subdomain.
    |
    */
    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Scalar Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Scalar will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */
    'path' => '/scalar',

    /*
    |--------------------------------------------------------------------------
    | Scalar Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached onto each Scalar route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */
    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Scalar OpenAPI Document URL
    |--------------------------------------------------------------------------
    |
    | This is the URL to the OpenAPI document that Scalar will use to generate
    | the API reference. By default, it points to the latest version of the
    | Scalar Galaxy package. You can change this to use a custom OpenAPI file.
    |
    */
    'url' => 'https://cdn.jsdelivr.net/npm/@scalar/galaxy/dist/latest.json',

    /*
    |--------------------------------------------------------------------------
    | Scalar OpenAPI Document Content
    |--------------------------------------------------------------------------
    |
    | Instead of fetching the document from a URL, you can embed it directly in
    | the page. Provide the raw OpenAPI document as a JSON or YAML string. When
    | set, this takes precedence over the URL above and the browser makes no
    | extra request for the document.
    |
    */
    'content' => null,

    /*
    |--------------------------------------------------------------------------
    | Scalar OpenAPI Document File
    |--------------------------------------------------------------------------
    |
    | Path to a local OpenAPI document (for example storage_path('app/openapi.
    | json')). The file is read on the server and embedded in the page, so it
    | never needs to be publicly accessible. This takes precedence over both
    | the content and URL options above.
    |
    */
    'file' => null,

    /*
    |--------------------------------------------------------------------------
    | Scalar CDN URL
    |--------------------------------------------------------------------------
    |
    | This is the URL to the CDN where Scalar's API reference assets are hosted.
    | By default, it points to the jsDelivr CDN for the @scalar/api-reference
    | package. You can change this if you want to use a different CDN.
    |
    */
    'cdn' => 'https://cdn.jsdelivr.net/npm/@scalar/api-reference',

    /*
    |--------------------------------------------------------------------------
    | Scalar Configuration
    |--------------------------------------------------------------------------
    |
    | The configuration options for the Scalar API reference. This array
    | contains all the settings that control the behavior and appearance
    | of the API documentation.
    |
    */
    'configuration' => [
        /** A string to use one of the color presets */
        'theme' =>
        // 'alternate',
        // 'bluePlanet',
        // 'deepSpace',
        // 'default',
        // 'kepler',
        'laravel',
        // 'mars',
        // 'moon',
        // 'purple',
        // 'saturn',
        // 'solarized',
        // 'laserwave',
        // 'none',

        /** The layout to use for the references */
        'layout' => 'modern',

        /** URL to a request proxy for the API client */
        'proxyUrl' => 'https://proxy.scalar.com',

        /** Whether to show the sidebar */
        'showSidebar' => true,

        /**
         * Whether to show models in the sidebar, search, and content.
         */
        'hideModels' => false,

        /**
         * File type of the “Download OpenAPI Document” button.
         * One of: 'json', 'yaml', 'both', 'direct', 'none' (set to 'none' to hide it).
         */
        'documentDownloadType' => 'both',

        /**
         * Whether to show the “Test Request” button
         */
        'hideTestRequestButton' => false,

        /**
         * Whether to show the sidebar search bar
         */
        'hideSearch' => false,

        /** Whether dark mode is on or off initially (light mode) */
        'darkMode' => false,

        /** forceDarkModeState makes it always this state no matter what*/
        'forceDarkModeState' => 'dark',

        /** Whether to show the dark mode toggle */
        'hideDarkModeToggle' => false,

        /** Key used with CTRL/CMD to open the search modal (defaults to 'k' e.g. CMD+k) */
        'searchHotKey' => 'k',

        /**
         * If used, passed data will be added to the HTML header
         *
         * @see https://unhead.unjs.io/usage/composables/use-seo-meta
         */
        'metaData' => [
            'title' => config('app.name').' API Reference',
        ],

        /**
         * Path to a favicon image
         *
         * @example '/favicon.svg'
         */
        'favicon' => '',

        /**
         * List of httpsnippet clients to hide from the clients menu
         * By default hides Unirest, pass `[]` to show all clients
         */
        'hiddenClients' => [

        ],

        /** Determine the HTTP client that’s selected by default */
        'defaultHttpClient' => [
            'targetKey' => 'shell',
            'clientKey' => 'curl',
        ],

        /** Custom CSS to be added to the page */
        // 'customCss' => '',

        /** Prefill authentication */
        // 'authentication' => [
        //     // TODO
        // ],

        /**
         * The baseServerURL is used when the spec servers are relative paths and we are using SSR.
         * On the client we can grab the window.location.origin but on the server we need
         * to use this prop.
         */
        // 'baseServerURL' => '',

        /**
         * List of servers to override the openapi spec servers
         */
        // 'servers' => [
        //     [
        //         'url' => 'https://api.scalar.com',
        //         'description' => 'Production server',
        //     ],
        // ],

        /**
         * We’re using Inter and JetBrains Mono as the default fonts. If you want to use your own fonts, set this to false.
         */
        'withDefaultFonts' => true,

        /**
         * By default we only open the relevant tag based on the url, however if you want all the tags open by default then set this configuration option :)
         */
        'defaultOpenAllTags' => false,

        /** Whether to open the first tag when the url doesn’t point to a specific operation */
        'defaultOpenFirstTag' => true,

        /** Whether to show the operationId next to the operation summary */
        'showOperationId' => false,

        /** Whether to show the “Open API Client” button in the sidebar and modal */
        'hideClientButton' => false,

        /** Whether to expand all model sections by default (can be slow on big documents) */
        'expandAllModelSections' => false,

        /** Whether to expand all response sections by default */
        'expandAllResponses' => false,

        /** Whether to expand all nested schema properties by default (can be slow on big documents) */
        'expandAllSchemaProperties' => false,

        /** Label used for the models/schemas section. Use 'Schemas' for OpenAPI terminology. */
        'modelsSectionLabel' => 'Models',

        /** Whether the sidebar and search use the operation 'summary' or 'path' */
        'operationTitleSource' => 'summary',

        /** Whether required properties are ordered before optional ones in schemas */
        'orderRequiredPropertiesFirst' => true,

        /** How schema properties are ordered: 'alpha' or 'preserve' */
        'orderSchemaPropertiesBy' => 'alpha',

        /** How operations are sorted in the sidebar: 'alpha', 'method' */
        'operationsSorter' => 'alpha',

        /** Whether to persist authentication credentials in the browser’s local storage */
        'persistAuth' => false,

        /** Whether to send anonymous telemetry (only when the analytics plugin is loaded) */
        'telemetry' => true,

        /** When to show the developer tools: 'always', 'localhost', 'never' */
        'showDeveloperTools' => 'localhost',
    ],

];
