@extends('backend.layout.master')
@section('title', 'Bağlantı Düzenle - Kontrol Paneli')
@section('subtitle', 'Bağlantı Düzenle')
@section('breadcrumb', '
    <li><span>Ayarlar</span></li>
    <li><span>Düzenle</span></li>
    <li><span>Bağlantı</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($contact, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.contact.update', $contact->id], 'method' => 'PATCH', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ url('admin/settings') }}" data-toggle="tooltip" data-original-title="Ayarlar"
                           class="fa fa-cog"></a>
                    </div>

                    <h2 class="panel-title">Bağlantı Düzenle</h2>
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
@section('js')
    <script src="{{ url('assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\ContactRequest', '#my-form') !!}
@endsection
