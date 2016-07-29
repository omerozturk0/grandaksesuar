<!doctype html>
<html class="fixed sidebar-left-sm">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title', 'Kontrol Paneli')</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="csrf" content="{{ csrf_token() }}" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/sweetalert/sweetalert.css') }}" />

    <!-- Web Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/assets/vendor/magnific-popup/magnific-popup.css') }}" />

    <!-- Specific Page Vendor CSS -->
    @yield('css')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ url('/assets/vendor/modernizr/modernizr.js') }}"></script>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/sweetalert/sweetalert.css') }}" />

</head>
<body>
    <section class="body">

        <!-- start: header -->
        @include('backend.layout.header')
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @include('backend.layout.leftsidebar')
            <!-- end: sidebar -->

            <section role="main" class="content-body">

                @include('backend.layout.breadcrumb')

                <!-- start: page -->
                @yield('content')
                <!-- end: page -->

            </section>
        </div>

    </section>

    <!-- Vendor -->
    <script src="{{ url('/assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ url('/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ url('/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ url('/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ url('/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('assets/javascripts/sweetalert/sweetalert.min.js') }}"></script>
    @include('sweet::alert')

    <!-- Specific Page Vendor -->
    @yield('js')

    <!-- Theme Base, Components and Settings -->
    <script src="{{ url('/assets/javascripts/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ url('/assets/javascripts/theme.custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ url('/assets/javascripts/theme.init.js') }}"></script>

    <!-- Examples -->
    <script src="{{ url('assets/javascripts/ui-elements/examples.modals.js') }}"></script>

</body>
</html>
