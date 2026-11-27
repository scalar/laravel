// Laravel supplies these values when the application has not overridden them.
export const applicationTitle = Symbol('application title');

export type ConfigurationValue = string | number | boolean | null | typeof applicationTitle
    | ConfigurationValue[] | { [key: string]: ConfigurationValue };

export const defaults: Record<string, ConfigurationValue> = {
    theme: 'laravel',
    layout: 'modern',
    proxyUrl: 'https://proxy.scalar.com',
    showSidebar: true,
    hideModels: false,
    documentDownloadType: 'both',
    hideTestRequestButton: false,
    hideSearch: false,
    darkMode: false,
    forceDarkModeState: 'dark',
    hideDarkModeToggle: false,
    searchHotKey: 'k',
    metaData: {
        title: applicationTitle,
    },
    favicon: '',
    hiddenClients: [],
    defaultHttpClient: {
        targetKey: 'shell',
        clientKey: 'curl',
    },
    withDefaultFonts: true,
    defaultOpenAllTags: false,
    defaultOpenFirstTag: true,
    showOperationId: false,
    hideClientButton: false,
    expandAllModelSections: false,
    expandAllResponses: false,
    expandAllSchemaProperties: false,
    modelsSectionLabel: 'Models',
    operationTitleSource: 'summary',
    orderRequiredPropertiesFirst: true,
    orderSchemaPropertiesBy: 'alpha',
    operationsSorter: 'alpha',
    persistAuth: false,
    telemetry: true,
    showDeveloperTools: 'localhost',
};

// Supply examples for settings whose useful values are specific to the application.
export const examples: Record<string, ConfigurationValue> = {
    agent: { disabled: true },
    authentication: { preferredSecurityScheme: 'bearerAuth' },
    baseServerURL: 'https://api.example.com',
    customCss: '.scalar-app { --scalar-color-accent: #5b48d6; }',
    externalUrls: { proxyUrl: 'https://proxy.example.com' },
    featuredClients: ['node/fetch'],
    localization: { locale: 'de' },
    maxVisibleRequestBodyProperties: 0,
    mcp: { name: 'My API', url: 'https://mcp.example.com' },
    oauth2RedirectUri: 'https://app.example.com/oauth/callback',
    pathRouting: { basePath: '/scalar' },
    pluginUrls: ['/plugins/reference.mjs'],
    servers: [{ url: 'https://api.example.com', description: 'Production' }],
    showExtensions: ['x-scopes'],
    slug: 'my-api',
    title: 'My API',
    urlRouting: false,
};

export const laravelNotes: Record<string, string> = {
    pathRouting: 'The package route only matches the base path. Route nested paths to the same Scalar controller.',
    theme: "Use 'laravel' for the theme shipped with this package.",
};
