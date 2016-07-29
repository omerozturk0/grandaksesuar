<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Şifremi Unuttum!</title>
    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Open+Sans:400,300,600,700,800&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/bootstrap/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ url('/assets/vendor/font-awesome/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ url('/assets/vendor/magnific-popup/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ url('/assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}"/>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/sweetalert/sweetalert.css') }}"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/theme.css') }}"/>

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/skins/default.css') }}"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ url('/assets/vendor/modernizr/modernizr.js') }}"></script>

</head>
<body>

<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="{{ url('admin') }}" class="logo pull-left">
            <img src="{{ url('/assets/images/logo.png') }}" height="54" alt="Porto Admin"/>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> ŞİFREMİ UNUTTUM!</h2>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/auth/email') }}" method="post" id="my-form" novalidate="novalidate">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <div class="form-group mb-none">
                        <div class="input-group">
                            <input type="email" class="form-control input-lg" placeholder="E-mail" name="email" value="{{ old('email') }}">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-lg">Reset!</button>
                            </span>
                        </div>
                        {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <p class="text-center mt-lg">Hatırladın mı? <a href="{{ url('admin/auth/login') }}">Giriş Yap!</a></p>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2015. All Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="{{ url('/assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ url('/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
<script src="{{ url('/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ url('/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{ url('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
<script src="{{ url('/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ url('/assets/javascripts/theme.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ url('/assets/javascripts/theme.custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ url('/assets/javascripts/theme.init.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ url('assets/javascripts/sweetalert/sweetalert.min.js') }}"></script>
@include('sweet::alert')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! \JsValidator::formRequest('App\Http\Requests\Backend\AuthReminderEmailRequest', '#my-form') !!}

</body>
</html>