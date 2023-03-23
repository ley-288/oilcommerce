<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Casa Camilloni">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom file -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- Ex Zoom - Product Zoom-->
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">
    <!-- Alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    @livewireStyles
    {{--@vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
    <div class="loading-overlay">
        <h1 class="italiano-font" style="margin-left:0;">Casa Camilloni</h1>
        <img src="{{ asset('admin/images/loading.gif') }}" class='mt-3 loading-gif' height='25' width='25' alt='RGM'>
    </div>
    <div id="app">
        @include('layouts.inc.frontend.navbar')
        <main>
            @yield('content')
        </main>
        @include('layouts.inc.frontend.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message', event => {
            if(event.detail){
                alertify.set('notifier','position', 'top-right');
                alertify.notify(event.detail.text, event.detail.type);
            }
        });
        $(document).ready(function(){
            const loadingOverlay = document.querySelector('.loading-overlay');
            loadingOverlay.classList.toggle('hide-loading-overlay');
        });
    </script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/cookie.js') }}"></script>
    @yield('script')
    @livewireScripts
    @stack('scripts')
</body>
</html>
