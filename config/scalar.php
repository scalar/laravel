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
        // Configure existing defaults above or uncomment an optional entry below.

        // agent (object)
        // Agent Scalar configuration

        // authentication (JSON value)
        // Prefill authentication

        // baseServerURL (string)
        // Base URL for the API server

        // customCss (string)
        // Custom CSS to be added to the page

        // darkMode (boolean)
        // Whether dark mode is on or off initially (light mode)

        // defaultHttpClient (object)
        // Determine the HTTP client that is selected by default

        // defaultOpenAllTags (boolean)
        // Whether to expand all tags by default. Warning: this can cause performance issues on big documents

        // defaultOpenFirstTag (boolean)
        // Whether to expand the first tag in the sidebar when no specific URL target is present

        // defaultRequestBodyView ("form" | "raw")
        // Initial view for the request body editor with structured (JSON/YAML) bodies
        // 'defaultRequestBodyView' => 'form',

        // documentDownloadType ("both" | "yaml" | "json" | "direct" | "none")
        // Sets the file type of the document to download, set to `none` to hide the download button

        // expandAllModelSections (boolean)
        // Whether to expand all models by default. Warning: this can cause performance issues on big documents

        // expandAllParameters (boolean)
        // Whether to show parameter details by default. Set to false to collapse each parameter.
        // 'expandAllParameters' => true,

        // expandAllResponses (boolean)
        // Whether to expand all responses by default. Warning: this can cause performance issues on big documents

        // expandAllSchemaProperties (boolean)
        // Whether to expand all nested schema properties by default. Each row keeps its own disclosure control, so nested sections can still be collapsed manually. Warning: this can cause performance issues on big documents

        // externalUrls (object)
        // External service URLs used by Scalar packages

        // favicon (string)
        // Path to a favicon image

        // featuredClients (array<string>)
        // Clients shown as tabs in the "Client Libraries" block, in order. The rest stay available in the "More" menu
        // 'featuredClients' => [],

        // forceDarkModeState ("dark" | "light")
        // forceDarkModeState makes it always this state no matter what

        // hiddenClients (object<boolean | array<string>> | array<string> | true)
        // List of httpsnippet clients to hide from the clients menu. By default hides Unirest, pass `[]` to show all clients

        // hideClientButton (boolean)
        // Whether to hide the client button

        // hideDarkModeToggle (boolean)
        // Whether to show the dark mode toggle

        // hideDownloadButton (boolean)
        // @deprecated Use `documentDownloadType: 'none'` instead

        // hideModelNames (boolean)
        // Show structural types instead of model names in schema type labels and operation headings. Model section headings and composition selector labels keep their names.
        // 'hideModelNames' => false,

        // hideModels (boolean)
        // Hide schema models and reusable AsyncAPI messages from the sidebar, search, and content.

        // hideSearch (boolean)
        // Whether to show the sidebar search bar

        // hideTestRequestButton (boolean)
        // Whether to show the "Test Request" button

        // isEditable (boolean)
        // Allows the user to inject an editor for the spec
        // 'isEditable' => false,

        // layout ("modern" | "classic")
        // The layout to use for the references

        // localization (object)
        // API Reference UI localization. Select a built-in locale, override labels, and control LTR/RTL rendering.

        // maxVisibleRequestBodyProperties (number)
        // Maximum initially visible top-level request body properties. Defaults to 12; 0 shows all without expanding nested properties.
        // 'maxVisibleRequestBodyProperties' => 12,

        // mcp (object)
        // MCP (Model Context Protocol) configuration. When provided, enables MCP integration with the given name and url.

        // metaData (JSON value)
        // If used, passed data will be added to the HTML header. @see https://unhead.unjs.io/usage/composables/use-seo-meta

        // modelsSectionLabel ("Models" | "Schemas" | string)
        // Label for the components.schemas section in the sidebar, content, and search. Use `Schemas` for OpenAPI terminology.

        // multipartNaming ("indexed-dot")
        // Use indexed dotted names for nested multipart and URL-encoded form fields.
        // 'multipartNaming' => 'indexed-dot',

        // oauth2RedirectUri (string)
        // Default OAuth 2.0 redirect URI used to prefill auth flows in the API client.

        // operationTitleSource ("summary" | "path")
        // Whether to use the operation summary or the operation path for the sidebar and search

        // operationsSorter ("alpha" | "method")
        // Function to sort operations

        // orderRequiredPropertiesFirst (boolean)
        // Sort the schema properties by required ones first

        // orderSchemaPropertiesBy ("alpha" | "preserve")
        // Order the schema properties by

        // pathRouting (object)
        // Route using paths instead of hashes, your server MUST support this. @experimental

        // persistAuth (boolean)
        // Whether to persist auth to local storage

        // persistSelectedClient (boolean)
        // Whether to save and restore the selected code sample client using local storage. @default true
        // 'persistSelectedClient' => true,

        // pluginUrls (array<string>)
        // URLs of ESM modules that provide additional plugins for the API reference. Each module is loaded with a dynamic `import()` before the API reference mounts, and its default export is registered as a plugin. Unlike `plugins`, this option is JSON-serializable, so integrations that pass their configuration as JSON can load plugins without replacing the whole bundle. Only supported by the standalone browser build (`Scalar.createApiReference`).
        // 'pluginUrls' => [],

        // proxy (string)
        // @deprecated Use proxyUrl instead

        // proxyUrl (string)
        // URL to a request proxy for the API client

        // schemaKeyboardNav (boolean)
        // Arrow-key navigation over the schema disclosure toggles (APG tree bindings). Off until screen-reader interaction questions are settled
        // 'schemaKeyboardNav' => false,

        // searchHotKey ("a" | "b" | "c" | "d" | "e" | "f" | "g" | "h" | "i" | "j" | "k" | "l" | "m" | "n" | "o" | "p" | "q" | "r" | "s" | "t" | "u" | "v" | "w" | "x" | "y" | "z")
        // Key used with CTRL/CMD to open the search modal (defaults to 'k' e.g. CMD+k)

        // servers (array<JSON value>)
        // List of OpenAPI server objects
        // 'servers' => [],

        // showBadgesInSidebar (boolean)
        // Whether to show the x-badges of operations, webhooks, tags, tag groups and models in the sidebar
        // 'showBadgesInSidebar' => false,

        // showDefaultClientsWithSdkInstallation (boolean)
        // Show built-in HTTP clients alongside `x-scalar-sdk-installation` tabs in the introduction. Defaults to false

        // showDeveloperTools ("localhost" | "always" | "never")
        // Whether and when to show the developer tools.

        // showExtensions (array<string>)
        // Extension keys to display on operations, parameters, response headers, and schema fields. Keys must start with x-. Custom plugin components take precedence.
        // 'showExtensions' => [],

        // showOperationId (boolean)
        // Whether to show the operationId

        // showSidebar (boolean)
        // Whether to show the sidebar

        // showToolbar ("localhost" | "always" | "never")
        // @deprecated Use showDeveloperTools instead
        // 'showToolbar' => 'localhost',

        // slug (string)
        // The slug of the OpenAPI document used in the URL. If none is passed, the title will be used. With multiple `sources`, set this per source.

        // tagsSorter ("alpha")
        // Function to sort tags
        // 'tagsSorter' => 'alpha',

        // telemetry (boolean)
        // Enables / disables telemetry

        // theme ("default" | "alternate" | "moon" | "purple" | "solarized" | "bluePlanet" | "deepSpace" | "saturn" | "kepler" | "elysiajs" | "fastify" | "mars" | "laserwave" | "halloween" | "none")
        // A string to use one of the color presets

        // title (string)
        // The title of the OpenAPI document. Used for the page title and the document name in the dropdown. With multiple `sources`, set this per source.

        // urlRouting (boolean)
        // Sync navigation with the browser URL. Set to false for embedded references that must leave the host URL and history alone. Defaults to true.

        // withDefaultFonts (boolean)
        // Whether to include default fonts
        // END GENERATED SCALAR OPTIONS
    ],

];
