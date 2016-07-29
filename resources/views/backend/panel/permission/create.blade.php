@extends('backend.layout.master')
@section('title', 'Yeni İzin - Kontrol Paneli')
@section('subtitle', 'Yeni')
@section('breadcrumb', '
    <li><span>İzinler</span></li>
    <li><span>Yeni</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'route' => 'admin.permission.store', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('list-permissions'))
                            <a href="{{ route('admin.permission.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">İzin Ekle</u></h2>
                </header>
                <div class="panel-body">

                    @include('backend.panel.permission.form')

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
@section('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\PermissionRequest', '#my-form') !!}
@endsection
