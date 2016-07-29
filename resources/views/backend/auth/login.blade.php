<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Giriş Yap</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/sweetalert/sweetalert.css') }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ url('/assets/stylesheets/skins/default.css') }}" />

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
                <img src="{{ url('/assets/images/logo.png') }}" height="54" alt="Porto Admin" />
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> GİRİŞ YAP</h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'post', 'id' => 'my-form']) !!}

                        <div class="form-group mb-lg">
                            {!! Form::label('email', 'Email') !!}
                            <div class="input-group input-group-icon">
                                {!! Form::text('email', null, ['class' => 'form-control input-lg']) !!}
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                            </div>
                            {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                {!! Form::label('password', 'Parola', ['class' => 'pull-left']) !!}
                                <a href="{{ url('admin/auth/email') }}" class="pull-right">Şifremi Unuttum!</a>
                            </div>
                            <div class="input-group input-group-icon">
                                {!! Form::password('password', ['class' => 'form-control input-lg']) !!}
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                            {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                        </div>

                        <div class="form-group mb-lg">
                            {!! Form::label(null, 'Doğrulama') !!}
                            <div class="input-group">
                                {!! app('captcha')->display() !!}
                            </div>
                            {!! $errors->first('g-recaptcha-response', '<small class="text-danger">:message</small>') !!}
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox"/>
                                    <label for="RememberMe">Beni Hatırla</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">GİRİŞ YAP</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">GİRİŞ YAP</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
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
    {!! \JsValidator::formRequest('App\Http\Requests\AdminAuthRequest', '#my-form') !!}


</body>
</html>