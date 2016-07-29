@extends('backend.layout.master')
@section('title', 'Yeni Menü - Kontrol Paneli')
@section('subtitle', 'Yeni')
@section('breadcrumb', '
    <li><span>Menüler</span></li>
    <li><span>Yeni</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'route' => 'admin.menu.store', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('list-menus'))
                            <a href="{{ route('admin.menu.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Menü Ekle</u></h2>
                </header>
                <div class="panel-body">

                    @include('backend.panel.menu.form')

                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            {!! Form::submit('Ekle', ['class' => 'btn btn-success']) !!}
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
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\MenuRequest', '#my-form') !!}
@endsection
