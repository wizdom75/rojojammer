<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') - {{ config('app.name', 'RojoHammer') }}</title>
    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-webstore" >
            <div class="container-fluid col-lg-12 col-xl-11">
                <a  href="" class="navbar-toggler rounded-0" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-bars fa-2x text-white"></i>
                </a>
                <a class="brand" href="{{ url('/') }}">
                   <i class="fas fa-globe text-success"></i> {{ config('app.name', 'RojoHammer') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @include('inc.search-form')
                </div>
                <a href="" class="navbar-toggler rounded-0" data-toggle="collapse" data-target="#mobileAccount" aria-controls="mobileAccount" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-user-circle fa-2x text-white"></i>   
                </a>
            </div>
        </nav>
        <main class="py-0 ">
            @include('inc.navigation')
            @include('inc.mobile-menu')
            @include('inc.mobile-signin')
            @include('inc.flash')
            @include('inc.mobile-search-form')
            @yield('content')
        </main>
    </div>
@include('inc.footer')
</body>
</html>
