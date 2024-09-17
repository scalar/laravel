<!doctype html>
<html>

<head>
    <title>{{ \Scalar\Scalar::pageTitle() }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if (config('scalar.configuration.theme') === 'laravel')
        <style>
            /* basic scalar */
            .light-mode {
                --scalar-color-1: #2a2f45;
                --scalar-color-2: #757575;
                --scalar-color-3: #8e8e8e;
                --scalar-color-accent: #eb4432;

                --scalar-background-1: #fff;
                --scalar-background-2: #f9f9fc;
                --scalar-background-3: #e7e7e7;
                --scalar-background-accent: transparent;

                --scalar-border-color: rgba(0, 0, 0, 0.1);
            }

            .dark-mode {
                --scalar-color-1: rgba(231, 232, 242, 1);
                --scalar-color-2: rgba(181, 181, 189, 1);
                --scalar-color-3: rgba(181, 181, 189, 0.66);
                --scalar-color-accent: #ff2c20;

                --scalar-background-1: #171923;
                --scalar-background-2: #252a37;
                --scalar-background-3: #343b4c;
                --scalar-background-accent: transparent;

                --scalar-border-color: rgba(255, 255, 255, 0.1);
            }

            /* Document header */
            .light-mode .t-doc__header {
                --header-background-1: var(--scalar-background-1);
                --header-border-color: var(--scalar-border-color);
                --header-color-1: var(--scalar-color-1);
                --header-color-2: var(--scalar-color-2);
                --header-background-toggle: var(--scalar-color-3);
                --header-call-to-action-color: var(--scalar-color-accent);
            }

            .dark-mode .t-doc__header {
                --header-background-1: var(--scalar-background-1);
                --header-border-color: var(--scalar-border-color);
                --header-color-1: var(--scalar-color-1);
                --header-color-2: var(--scalar-color-2);
                --header-background-toggle: var(--scalar-color-3);
                --header-call-to-action-color: var(--scalar-color-accent);
            }

            /* Document Sidebar */
            .light-mode .t-doc__sidebar {
                --scalar-sidebar-background-1: #f9f9fc;
                --scalar-sidebar-item-hover-color: currentColor;
                --scalar-sidebar-item-hover-background: var(--scalar-background-2);
                --scalar-sidebar-item-active-background: var(--scalar-background-accent);
                --scalar-sidebar-border-color: var(--scalar-sidebar-background-1);
                --scalar-sidebar-color-1: var(--scalar-color-1);
                --scalar-sidebar-color-2: var(--scalar-color-1);
                --scalar-sidebar-color-active: var(--scalar-color-accent);
                --scalar-sidebar-search-background: transparent;
                --scalar-sidebar-search-border-color: var(--scalar-border-color);
                --scalar-sidebar-search--color: var(--scalar-color-3);
            }

            .dark-mode .t-doc__sidebar {
                --scalar-sidebar-background-1: #14151e;
                --scalar-sidebar-item-hover-color: currentColor;
                --scalar-sidebar-item-hover-background: var(--scalar-background-2);
                --scalar-sidebar-item-active-background: var(--scalar-background-accent);
                --scalar-sidebar-border-color: var(--scalar-sidebar-background-1);
                --scalar-sidebar-color-1: var(--scalar-color-1);
                --scalar-sidebar-color-2: var(--scalar-color-1);
                --scalar-sidebar-color-active: var(--scalar-color-accent);
                --scalar-sidebar-search-background: transparent;
                --scalar-sidebar-search-border-color: var(--scalar-border-color);
                --scalar-sidebar-search--color: var(--scalar-color-3);
            }

            /* advanced */
            .light-mode {
                --scalar-button-1: rgb(49 53 56);
                --scalar-button-1-color: #fff;
                --scalar-button-1-hover: rgb(28 31 33);

                --scalar-color-green: #069061;
                --scalar-color-red: #ef0006;
                --scalar-color-yellow: #edbe20;
                --scalar-color-blue: #0082d0;
                --scalar-color-orange: #fb892c;
                --scalar-color-purple: #5203d1;

                --scalar-scrollbar-color: rgba(0, 0, 0, 0.18);
                --scalar-scrollbar-color-active: rgba(0, 0, 0, 0.36);
            }

            .dark-mode {
                --scalar-button-1: #f6f6f6;
                --scalar-button-1-color: #000;
                --scalar-button-1-hover: #e7e7e7;

                --scalar-color-green: #c3e88d;
                --scalar-color-red: #dc1b19;
                --scalar-color-yellow: #ffc90d;
                --scalar-color-blue: #82aaff;
                --scalar-color-orange: #ffcb8b;
                --scalar-color-purple: #b191f9;

                --scalar-scrollbar-color: rgba(255, 255, 255, 0.24);
                --scalar-scrollbar-color-active: rgba(255, 255, 255, 0.48);
            }

            /* custom scalar */
            .sidebar-indent-nested .sidebar-indent-nested .sidebar-heading.active_page:not(.sidebar-group-item__folder):after {
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
                text-decoration-color: var(--scalar-color-accent) !important;
            }
        </style>
    @endif
</head>

<body>
    @yield('content')
</body>

</html>
