<!doctype html>
<html>

<head>
    <title>Scalar API Reference</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if (config('scalar.configuration.theme') === 'laravel')
        <style>
            :root {
                --theme-font: 'Inter', var(--system-fonts);
            }

            /* basic theme */
            .light-mode {
                --theme-color-1: #2a2f45;
                --theme-color-2: #757575;
                --theme-color-3: #8e8e8e;
                --theme-color-accent: #eb4432;

                --theme-background-1: #fff;
                --theme-background-2: #f9f9fc;
                --theme-background-3: #e7e7e7;
                --theme-background-accent: transparent;

                --theme-border-color: rgba(0, 0, 0, 0.1);
            }

            .dark-mode {
                --theme-color-1: rgba(231, 232, 242, 1);
                --theme-color-2: rgba(181, 181, 189, 1);
                --theme-color-3: rgba(181, 181, 189, .66);
                --theme-color-accent: #ff2c20;

                --theme-background-1: #171923;
                --theme-background-2: #252a37;
                --theme-background-3: #343b4c;
                --theme-background-accent: transparent;

                --theme-border-color: rgba(255, 255, 255, 0.1);
            }

            /* Document header */
            .light-mode .t-doc__header {
                --header-background-1: var(--theme-background-1);
                --header-border-color: var(--theme-border-color);
                --header-color-1: var(--theme-color-1);
                --header-color-2: var(--theme-color-2);
                --header-background-toggle: var(--theme-color-3);
                --header-call-to-action-color: var(--theme-color-accent);
            }

            .dark-mode .t-doc__header {
                --header-background-1: var(--theme-background-1);
                --header-border-color: var(--theme-border-color);
                --header-color-1: var(--theme-color-1);
                --header-color-2: var(--theme-color-2);
                --header-background-toggle: var(--theme-color-3);
                --header-call-to-action-color: var(--theme-color-accent);
            }

            /* Document Sidebar */
            .light-mode .t-doc__sidebar {
                --sidebar-background-1: #f9f9fc;
                --sidebar-item-hover-color: currentColor;
                --sidebar-item-hover-background: var(--theme-background-2);
                --sidebar-item-active-background: var(--theme-background-accent);
                --sidebar-border-color: var(--sidebar-background-1);
                --sidebar-color-1: var(--theme-color-1);
                --sidebar-color-2: var(--theme-color-2);
                --sidebar-color-active: var(--theme-color-accent);
                --sidebar-search-background: transparent;
                --sidebar-search-border-color: var(--theme-border-color);
                --sidebar-search--color: var(--theme-color-3);
            }

            .dark-mode .t-doc__sidebar {
                --sidebar-background-1: #14151e;
                --sidebar-item-hover-color: currentColor;
                --sidebar-item-hover-background: var(--theme-background-2);
                --sidebar-item-active-background: var(--theme-background-accent);
                --sidebar-border-color: --sidebar-background-1;
                --sidebar-color-1: var(--theme-color-1);
                --sidebar-color-2: var(--theme-color-2);
                --sidebar-color-active: var(--theme-color-accent);
                --sidebar-search-background: transparent;
                --sidebar-search-border-color: var(--theme-border-color);
                --sidebar-search--color: var(--theme-color-3);
            }

            /* advanced */
            .light-mode {
                --theme-button-1: rgb(49 53 56);
                --theme-button-1-color: #fff;
                --theme-button-1-hover: rgb(28 31 33);

                --theme-color-green: #069061;
                --theme-color-red: #ef0006;
                --theme-color-yellow: #edbe20;
                --theme-color-blue: #0082d0;
                --theme-color-orange: #fb892c;
                --theme-color-purple: #5203d1;

                --theme-scrollbar-color: rgba(0, 0, 0, 0.18);
                --theme-scrollbar-color-active: rgba(0, 0, 0, 0.36);
            }

            .dark-mode {
                --theme-button-1: #f6f6f6;
                --theme-button-1-color: #000;
                --theme-button-1-hover: #e7e7e7;

                --theme-color-green: #C3E88D;
                --theme-color-red: #dc1b19;
                --theme-color-yellow: #ffc90d;
                --theme-color-blue: #82AAFF;
                --theme-color-orange: #FFCB8B;
                --theme-color-purple: #b191f9;

                --theme-scrollbar-color: rgba(255, 255, 255, 0.24);
                --theme-scrollbar-color-active: rgba(255, 255, 255, 0.48);
            }

            /* custom theme */
            .sidebar-indent-nested .sidebar-heading.active_page:not(.sidebar-group-item__folder):before {
                content: "";
                position: absolute;
                top: 11px;
                left: 7px;
                width: 0.5rem;
                height: 0.5rem;
                background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxwYXRoIGZpbGw9IiNGRjJEMjAiIGQ9Im00IDAgMy40NjQgMnY0TDQgOCAuNTM2IDZWMnoiLz48L3N2Zz4=) no-repeat center;
            }

            .references-rendered .markdown a,
            .download-cta {
                text-decoration: underline !important;
                text-decoration-color: var(--theme-color-accent) !important;
            }

            .t-doc__header .header-item-logo {
                height: 32px
            }
        </style>
    @endif
</head>

<body>
    <script id="api-reference" data-url="{{ config('scalar.url') }}"></script>

    <!-- Optional: You can set a full configuration object like this: -->
    <script>
        var configuration = {!! json_encode(
            array_merge(config('scalar.configuration'), [
                'theme' => config('scalar.configuration.theme') === 'laravel' ? 'none' : config('scalar.configuration.theme'),
            ]),
        ) !!}

        document.getElementById('api-reference').dataset.configuration =
            JSON.stringify(configuration)
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@scalar/api-reference"></script>
</body>

</html>
