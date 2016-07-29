@extends('backend.layout.master')
@section('title', 'Menü Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>Menüler</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($menu, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.menu.update', $menu->id], 'method' => 'PATCH', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-menu'))
                            <a href="{{ route('admin.menu.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-menus'))
                            <a href="{{ route('admin.menu.index') }}" data-toggle="tooltip"
                               data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                        @if(Entrust::can('delete-menu'))
                            <a href="#modalIcon"
                               data-href="{{ route('admin.menu.destroy', $menu->id) }}"
                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Menü Düzenle</h2>

                    @if($menu->name)
                    <p class="panel-subtitle">
                        {{ $menu->name }} <i class="fa fa-level-up"></i>
                    </p>
                    @endif
                </header>
                <div class="panel-body">

                    @include('backend.panel.menu.form')

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
@section('css')
    <link rel="stylesheet" href="{{ url('assets/vendor/select2/select2.css') }}"/>
@endsection
@section('js')
    <script src="{{ url('assets/vendor/select2/select2.js') }}"></script>
    <script src="{{ url('assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\MenuRequest', '#my-form') !!}
    <script>
        $('select[name="parent_id"]').select2().select2('val', '{{ $menu->parent_id }}');
        $('select[name="post_id"]').select2().select2('val', '{{ $menu->post_id }}');
        $('select[name="locale"]').select2().select2('val', '{{ app()->getLocale() }}');
    </script>
    <script>
        $('select[name="locale"]').bind('change', function (e) {
            var a = "{{ route('admin.menu.edit', $menu->id) }}";
            var b = $('select[name="locale"]').select2().select2('val');
            window.location.href = a+'?lang='+b;
        });
    </script>
@endsection
