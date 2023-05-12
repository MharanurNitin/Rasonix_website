<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!--  Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!--  fontawesome CDN -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>



    @include('admin_layouts.includes.admin-navbar')

    <div id="layoutSidenav">

        @include('admin_layouts.includes.admin-sidebar')

        <div id="layoutSidenav_content">

            <main>
                @yield('content')
            </main>

            @include('admin_layouts.includes.admin-footer')

        </div>
    </div>



    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>
