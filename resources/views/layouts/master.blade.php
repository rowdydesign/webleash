    @include('includes.top')

    <body class="{{ isset($bodyClasses) ? $bodyClasses : '' }}">
        @yield('header')

        <!-- Main Content begin -->
        <main id="main">
            @yield('main')
        </main>
        <!-- Main Content end -->
    </body>
</html>
