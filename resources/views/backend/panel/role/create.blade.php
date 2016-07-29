@extends('backend.layout.master')
@section('title', 'Yeni Rol - Kontrol Paneli')
@section('subtitle', 'Yeni')
@section('breadcrumb', '
    <li><span>Rollar</span></li>
    <li><span>Yeni</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'route' => 'admin.role.store', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('list-roles'))
                            <a href="{{ route('admin.role.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Rol Ekle</u></h2>
                </header>
                <div class="panel-body">

                    @include('backend.panel.role.form')

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
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\RoleRequest', '#my-form') !!}
@endsection
