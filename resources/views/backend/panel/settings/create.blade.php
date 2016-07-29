@extends('backend.layout.master')
@section('title', 'Bağlantı Ekle - Kontrol Paneli')
@section('subtitle', 'Bağlantı Ekle')
@section('breadcrumb', '
    <li><span>Ayarlar</span></li>
    <li><span>Ekle</span></li>
    <li><span>Bağlantı</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'route' => 'admin.contact.store', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ url('admin/settings') }}" data-toggle="tooltip" data-original-title="Ayarlar"
                           class="fa fa-cog"></a>
                    </div>

                    <h2 class="panel-title">Bağlantı Ekle</h2>
                </header>
                <div class="panel-body">

                    @include('backend.panel.settings.form')

                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            {!! Form::submit('Kaydet', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </footer>

                {!! Form::close() !!}
            </section>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('assets/vendor/select2/select2.css') }}"/>
@endsection
@section('js')
    <script src="{{ url('assets/vendor/select2/select2.js') }}"></script>
    <script src="{{ url('assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\ContactRequest', '#my-form') !!}
    <script>
        $('select[name="type"]').select2().select2('val', '{{ Request::has('type') ? Request::get('type') : 1 }}');
        $('select[name="type"]').bind('change', function (e) {
            var a = "{{ Request::url() }}";
            var b = $('select[name="type"]').select2().select2('val');
            window.location.href = a+'?type='+b;
        });
    </script>
@endsection
