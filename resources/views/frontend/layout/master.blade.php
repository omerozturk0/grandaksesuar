<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', settings('site_title'))</title>
        <meta name="description" content="@yield('description', settings('site_dsc'))">
        <meta name="keywords" content="@yield('keywords', settings('site_kyw'))">

        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.ico') }}">

        <!-- CSS Global -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/prettyphoto/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/owl-carousel2/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/owl-carousel2/assets/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/theme-blue-2.css') }}" rel="stylesheet" id="theme-config-link">

        <!-- Head Libs -->
        <script src="{{ asset('assets/plugins/modernizr.custom.js') }}"></script>

        <!--[if lt IE 9]>
        <script src="{{ asset('assets/plugins/iesupport/html5shiv.js') }}"></script>
        <script src="{{ asset('assets/plugins/iesupport/respond.min.js') }}"></script>
        <![endif]-->

        @yield('css')
    </head>
    <body id="home" class="wide">
        <!-- PRELOADER -->
        <div id="preloader">
            <div id="preloader-status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <div id="preloader-title">Loading</div>
            </div>
        </div>
        <!-- /PRELOADER -->

        <!-- WRAPPER -->
        <div class="wrapper">

            @include('frontend.layout.header')

            @yield('content')

            @include('frontend.layout.footer')

        </div>
        <!-- /WRAPPER -->

        <!-- JS Global -->
        <script src="{{ asset('assets/plugins/jquery/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/superfish/js/superfish.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('assets/plugins/owl-carousel2/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.sticky.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.smoothscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/smooth-scrollbar.min.js') }}"></script>

        <!-- JS Page Level -->
        <script src="{{ asset('assets/js/theme.js') }}"></script>

        <!--[if (gte IE 9)|!(IE)]><!-->
        <script src="{{ asset('assets/plugins/jquery.cookie.js') }}"></script>
        <!--<![endif]-->

        @yield('js')

    </body>
</html>
