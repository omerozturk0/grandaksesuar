@extends('backend.layout.master')
@section('title', 'Rol Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>Rollar</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($role, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.role.update', $role->id], 'method' => 'PATCH', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-role'))
                            <a href="{{ route('admin.role.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-roles'))
                            <a href="{{ route('admin.role.index') }}" data-toggle="tooltip"
                               data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                        @if(Entrust::can('delete-role'))
                            <a href="#modalIcon"
                               data-href="{{ route('admin.role.destroy', $role->id) }}"
                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Rol Düzenle</h2>

                    <p class="panel-subtitle">
                        {{ $role->name }} <i class="fa fa-level-up"></i>
                    </p>
                </header>
                <div class="panel-body">

                    @include('backend.panel.role.form')

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

            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'url' => 'admin/role/'.$role->id.'/attach/permissions', 'method' => 'post', 'id' => 'my-form-2']) !!}

                <header class="panel-heading">
                    <h2 class="panel-title">İzinler</h2>
                </header>
                <div class="panel-body">

                    @foreach($permissions as $index => $permission)
                        <div class="col-md-4">
                            <div class="checkbox-custom checkbox-success">
                                <input type="checkbox" @if($role->perms->where('name', $permission->name)->first()) checked="" @endif id="checkboxExample{{ $index }}" name="{{ $permission->name }}">
                                <label for="checkboxExample{{ $index }}">{{ $permission->display_name }}</label>
                            </div>
                        </div>
                    @endforeach
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
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\RoleRequest', '#my-form') !!}
@endsection
