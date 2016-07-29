@extends('backend.layout.master')
@section('title', 'İzin Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>İzinler</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($permission, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.permission.update', $permission->id], 'method' => 'PATCH', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-permission'))
                            <a href="{{ route('admin.permission.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-permissions'))
                            <a href="{{ route('admin.permission.index') }}" data-toggle="tooltip"
                               data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                        @if(Entrust::can('delete-permission'))
                            <a href="#modalIcon"
                               data-href="{{ route('admin.permission.destroy', $permission->id) }}"
                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>

                    <h2 class="panel-title">İzin Düzenle</h2>

                    <p class="panel-subtitle">
                        {{ $permission->name }} <i class="fa fa-level-up"></i>
                    </p>
                </header>
                <div class="panel-body">

                    @include('backend.panel.permission.form')

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

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\PermissionRequest', '#my-form') !!}
@endsection
