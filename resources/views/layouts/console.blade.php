    @include('includes.console.top')

    <body class="{{ isset($bodyClasses) ? $bodyClasses : '' }} page page-console has-sidebar-menu">

        <!-- Page begin -->
        <div id="page">

            @yield('header')

            <!-- Sidebar begin -->
            <aside id="sidebar">
                @include('includes.console.sidebar')
            </aside>
            <!-- Sidebar end -->

            <!-- Main Content begin -->
            <main id="main">
                @yield('main')
            </main>
            <!-- Main Content end -->

        </div>
        <!-- Page end -->

    </body>
</html>
