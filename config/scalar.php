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
    | Scalar OpenAPI Documents (multiple / versioned)
    |--------------------------------------------------------------------------
    |
    | Render more than one OpenAPI document behind a document switcher. Each
    | source accepts a `title`, an optional `slug`, one of `url`/`content`/
    | `file`, and an optional `default` flag. When set, this takes precedence
    | over the single-document options above.
    |
    | You can also register documents at runtime with the Scalar facade:
    |
    |     Scalar::document('API v2')->url('/openapi/v2.yaml')->default();
    |
    */
    'sources' => [
        // [
        //     'title' => 'API v1',
        //     'slug' => 'v1',
        //     'url' => '/openapi/v1.yaml',
        // ],
        // [
        //     'title' => 'API v2',
        //     'slug' => 'v2',
        //     'url' => '/openapi/v2.yaml',
        //     'default' => true,
        // ],
    ],

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
        // Laravel's built-in theme, application name, and client defaults.
        'theme' => 'laravel',
        'layout' => 'modern',
        'proxyUrl' => 'https://proxy.scalar.com',
        'showSidebar' => true,
        'hideModels' => false,
        'documentDownloadType' => 'both',
        'hideTestRequestButton' => false,
        'hideSearch' => false,
        'darkMode' => false,
        'forceDarkModeState' => 'dark',
        'hideDarkModeToggle' => false,
        'searchHotKey' => 'k',
        'metaData' => [
            'title' => config('app.name').' API Reference',
        ],
        'favicon' => '',
        'hiddenClients' => [],
        'defaultHttpClient' => [
            'targetKey' => 'shell',
            'clientKey' => 'curl',
        ],
        'withDefaultFonts' => true, // Legacy setting for older client bundles.
        'defaultOpenAllTags' => false,
        'defaultOpenFirstTag' => true,
        'showOperationId' => false,
        'hideClientButton' => false,
        'expandAllModelSections' => false,
        'expandAllResponses' => false,
        'expandAllSchemaProperties' => false,
        'modelsSectionLabel' => 'Models',
        'operationTitleSource' => 'summary',
        'orderRequiredPropertiesFirst' => true,
        'orderSchemaPropertiesBy' => 'alpha',
        'operationsSorter' => 'alpha',
        'persistAuth' => false,
        'telemetry' => true,
        'showDeveloperTools' => 'localhost',

        // BEGIN GENERATED SCALAR OPTIONS
        // Generated by npm run generate:configuration.

        // agent (object)
        // Agent Scalar configuration

        // authentication (JSON value)
        // Prefill authentication

        // baseServerURL (string)
        // Base URL for the API server

        // customCss (string)
        // Custom CSS to be added to the page

        // defaultRequestBodyView ("form" | "raw")
        // Initial view for the request body editor with structured (JSON/YAML) bodies
        // 'defaultRequestBodyView' => 'form',

        // expandAllParameters (boolean)
        // Whether to show parameter details by default. Set to false to collapse each parameter.
        // 'expandAllParameters' => true,

        // externalUrls (object)
        // External service URLs used by Scalar packages

        // featuredClients (array<string>)
        // Clients shown as tabs in the "Client Libraries" block, in order. The rest stay available in the "More" menu
        // 'featuredClients' => [],

        // hideDownloadButton (boolean)
        // @deprecated Use `documentDownloadType: 'none'` instead

        // hideModelNames (boolean)
        // Show structural types instead of model names in schema type labels and operation headings. Model section headings and composition selector labels keep their names.
        // 'hideModelNames' => false,

        // isEditable (boolean)
        // Allows the user to inject an editor for the spec
        // 'isEditable' => false,

        // localization (object)
        // API Reference UI localization. Select a built-in locale, override labels, and control LTR/RTL rendering.

        // maxVisibleRequestBodyProperties (number)
        // Maximum initially visible top-level request body properties. Defaults to 12; 0 shows all without expanding nested properties.
        // 'maxVisibleRequestBodyProperties' => 12,

        // mcp (object)
        // MCP (Model Context Protocol) configuration. When provided, enables MCP integration with the given name and url.

        // multipartNaming ("indexed-dot")
        // Use indexed dotted names for nested multipart and URL-encoded form fields.
        // 'multipartNaming' => 'indexed-dot',

        // oauth2RedirectUri (string)
        // Default OAuth 2.0 redirect URI used to prefill auth flows in the API client.

        // pathRouting (object)
        // Route using paths instead of hashes, your server MUST support this. @experimental

        // persistSelectedClient (boolean)
        // Whether to save and restore the selected code sample client using local storage. @default true
        // 'persistSelectedClient' => true,

        // pluginUrls (array<string>)
        // URLs of ESM modules that provide additional plugins for the API reference. Each module is loaded with a dynamic `import()` before the API reference mounts, and its default export is registered as a plugin. Unlike `plugins`, this option is JSON-serializable, so integrations that pass their configuration as JSON can load plugins without replacing the whole bundle. Only supported by the standalone browser build (`Scalar.createApiReference`).
        // 'pluginUrls' => [],

        // proxy (string)
        // @deprecated Use proxyUrl instead

        // schemaKeyboardNav (boolean)
        // Arrow-key navigation over the schema disclosure toggles (APG tree bindings). Off until screen-reader interaction questions are settled
        // 'schemaKeyboardNav' => false,

        // servers (array<JSON value>)
        // List of OpenAPI server objects
        // 'servers' => [],

        // showBadgesInSidebar (boolean)
        // Whether to show the x-badges of operations, webhooks, tags, tag groups and models in the sidebar
        // 'showBadgesInSidebar' => false,

        // showDefaultClientsWithSdkInstallation (boolean)
        // Show built-in HTTP clients alongside `x-scalar-sdk-installation` tabs in the introduction. Defaults to false

        // showExtensions (array<string>)
        // Extension keys to display on operations, parameters, response headers, and schema fields. Keys must start with x-. Custom plugin components take precedence.
        // 'showExtensions' => [],

        // showToolbar ("localhost" | "always" | "never")
        // @deprecated Use showDeveloperTools instead
        // 'showToolbar' => 'localhost',

        // slug (string)
        // The slug of the OpenAPI document used in the URL. If none is passed, the title will be used. With multiple `sources`, set this per source.

        // tagsSorter ("alpha")
        // Function to sort tags
        // 'tagsSorter' => 'alpha',

        // title (string)
        // The title of the OpenAPI document. Used for the page title and the document name in the dropdown. With multiple `sources`, set this per source.

        // urlRouting (boolean)
        // Sync navigation with the browser URL. Set to false for embedded references that must leave the host URL and history alone. Defaults to true.
        // END GENERATED SCALAR OPTIONS
    ],

];
