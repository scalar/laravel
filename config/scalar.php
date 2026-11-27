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
    | Customize the API reference or uncomment an optional setting below.
    | See the configuration reference in the README for available values.
    |
    */
    'configuration' => [
        // A string to use one of the color presets
        // Use 'laravel' for the theme shipped with this package.
        'theme' => 'laravel',

        // The layout to use for the references
        'layout' => 'modern',

        // URL to a request proxy for the API client
        'proxyUrl' => 'https://proxy.scalar.com',

        // Whether to show the sidebar
        'showSidebar' => true,

        // Hide schema models and reusable AsyncAPI messages from the sidebar, search, and
        // content.
        'hideModels' => false,

        // Sets the file type of the document to download, set to 'none' to hide the download
        // button
        'documentDownloadType' => 'both',

        // Whether to show the "Test Request" button
        'hideTestRequestButton' => false,

        // Whether to show the sidebar search bar
        'hideSearch' => false,

        // Whether dark mode is on or off initially (light mode)
        'darkMode' => false,

        // forceDarkModeState makes it always this state no matter what
        'forceDarkModeState' => 'dark',

        // Whether to show the dark mode toggle
        'hideDarkModeToggle' => false,

        // Key used with CTRL/CMD to open the search modal (defaults to 'k' e.g. CMD+k)
        'searchHotKey' => 'k',

        // If used, passed data will be added to the HTML header. @see
        // https://unhead.unjs.io/usage/composables/use-seo-meta
        'metaData' => [
            'title' => config('app.name').' API Reference',
        ],

        // Path to a favicon image
        'favicon' => '',

        // List of httpsnippet clients to hide from the clients menu. By default hides Unirest,
        // pass '[]' to show all clients
        'hiddenClients' => [],

        // Determine the HTTP client that is selected by default
        'defaultHttpClient' => [
            'targetKey' => 'shell',
            'clientKey' => 'curl',
        ],

        // Whether to include default fonts
        'withDefaultFonts' => true,

        // Whether to expand all tags by default. Warning: this can cause performance issues on
        // big documents
        'defaultOpenAllTags' => false,

        // Whether to expand the first tag in the sidebar when no specific URL target is
        // present
        'defaultOpenFirstTag' => true,

        // Whether to show the operationId
        'showOperationId' => false,

        // Whether to hide the client button
        'hideClientButton' => false,

        // Whether to expand all models by default. Warning: this can cause performance issues
        // on big documents
        'expandAllModelSections' => false,

        // Whether to expand all responses by default. Warning: this can cause performance
        // issues on big documents
        'expandAllResponses' => false,

        // Whether to expand all nested schema properties by default. Each row keeps its own
        // disclosure control, so nested sections can still be collapsed manually. Warning:
        // this can cause performance issues on big documents
        'expandAllSchemaProperties' => false,

        // Label for the components.schemas section in the sidebar, content, and search. Use
        // 'Schemas' for OpenAPI terminology.
        'modelsSectionLabel' => 'Models',

        // Whether to use the operation summary or the operation path for the sidebar and
        // search
        'operationTitleSource' => 'summary',

        // Sort the schema properties by required ones first
        'orderRequiredPropertiesFirst' => true,

        // Order the schema properties by
        'orderSchemaPropertiesBy' => 'alpha',

        // Function to sort operations
        'operationsSorter' => 'alpha',

        // Whether to persist auth to local storage
        'persistAuth' => false,

        // Enables / disables telemetry
        'telemetry' => true,

        // Whether and when to show the developer tools.
        'showDeveloperTools' => 'localhost',

        // Agent Scalar configuration
        // 'agent' => [
        //     'disabled' => true,
        // ],

        // Prefill authentication
        // 'authentication' => [
        //     'preferredSecurityScheme' => 'bearerAuth',
        // ],

        // Base URL for the API server
        // 'baseServerURL' => 'https://api.example.com',

        // Custom CSS to be added to the page
        // 'customCss' => '.scalar-app { --scalar-color-accent: #5b48d6; }',

        // Initial view for the request body editor with structured (JSON/YAML) bodies
        // 'defaultRequestBodyView' => 'form',

        // Whether to show parameter details by default. Set to false to collapse each
        // parameter.
        // 'expandAllParameters' => false,

        // External service URLs used by Scalar packages
        // 'externalUrls' => [
        //     'proxyUrl' => 'https://proxy.example.com',
        // ],

        // Clients shown as tabs in the "Client Libraries" block, in order. The rest stay
        // available in the "More" menu
        // 'featuredClients' => [
        //     'node/fetch',
        // ],

        // Show structural types instead of model names in schema type labels and operation
        // headings. Model section headings and composition selector labels keep their names.
        // 'hideModelNames' => true,

        // Allows the user to inject an editor for the spec
        // 'isEditable' => true,

        // API Reference UI localization. Select a built-in locale, override labels, and
        // control LTR/RTL rendering.
        // 'localization' => [
        //     'locale' => 'de',
        // ],

        // Maximum initially visible top-level request body properties. Defaults to 12; 0 shows
        // all without expanding nested properties.
        // 'maxVisibleRequestBodyProperties' => 0,

        // MCP (Model Context Protocol) configuration. When provided, enables MCP integration
        // with the given name and url.
        // 'mcp' => [
        //     'name' => 'My API',
        //     'url' => 'https://mcp.example.com',
        // ],

        // Use indexed dotted names for nested multipart and URL-encoded form fields.
        // 'multipartNaming' => 'indexed-dot',

        // Default OAuth 2.0 redirect URI used to prefill auth flows in the API client.
        // 'oauth2RedirectUri' => 'https://app.example.com/oauth/callback',

        // Route using paths instead of hashes, your server MUST support this. @experimental
        // The package route only matches the base path. Route nested paths to the same Scalar
        // controller.
        // 'pathRouting' => [
        //     'basePath' => '/scalar',
        // ],

        // Whether to save and restore the selected code sample client using local storage.
        // @default true
        // 'persistSelectedClient' => false,

        // URLs of ESM modules that provide additional plugins for the API reference. Each
        // module is loaded with a dynamic 'import()' before the API reference mounts, and its
        // default export is registered as a plugin. Unlike 'plugins', this option is
        // JSON-serializable, so integrations that pass their configuration as JSON can load
        // plugins without replacing the whole bundle. Only supported by the standalone browser
        // build ('Scalar.createApiReference').
        // 'pluginUrls' => [
        //     '/plugins/reference.mjs',
        // ],

        // Arrow-key navigation over the schema disclosure toggles (APG tree bindings). Off
        // until screen-reader interaction questions are settled
        // 'schemaKeyboardNav' => true,

        // List of OpenAPI server objects
        // 'servers' => [
        //     [
        //         'url' => 'https://api.example.com',
        //         'description' => 'Production',
        //     ],
        // ],

        // Whether to show the x-badges of operations, webhooks, tags, tag groups and models in
        // the sidebar
        // 'showBadgesInSidebar' => true,

        // Show built-in HTTP clients alongside 'x-scalar-sdk-installation' tabs in the
        // introduction. Defaults to false
        // 'showDefaultClientsWithSdkInstallation' => true,

        // Extension keys to display on operations, parameters, response headers, and schema
        // fields. Keys must start with x-. Custom plugin components take precedence.
        // 'showExtensions' => [
        //     'x-scopes',
        // ],

        // The slug of the OpenAPI document used in the URL. If none is passed, the title will
        // be used. With multiple 'sources', set this per source.
        // 'slug' => 'my-api',

        // Function to sort tags
        // 'tagsSorter' => 'alpha',

        // The title of the OpenAPI document. Used for the page title and the document name in
        // the dropdown. With multiple 'sources', set this per source.
        // 'title' => 'My API',

        // Sync navigation with the browser URL. Set to false for embedded references that must
        // leave the host URL and history alone. Defaults to true.
        // 'urlRouting' => false,
    ],

];
