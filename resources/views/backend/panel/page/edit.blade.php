@extends('backend.layout.master')
@section('title', 'Sayfa Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>Sayfalar</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($page, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.page.update', $page->id], 'method' => 'PATCH', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-page'))
                            <a href="{{ route('admin.page.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-pages'))
                            <a href="{{ route('admin.page.index') }}" data-toggle="tooltip"
                               data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                        @if(Entrust::can('delete-page'))
                            <a href="#modalIcon"
                               data-href="{{ route('admin.page.destroy', $page->id) }}"
                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Sayfa Düzenle</h2>

                    @if($page->name)
                        <p class="panel-subtitle">
                            {{ $page->name }} <i class="fa fa-level-up"></i>
                        </p>
                    @endif
                </header>
                <div class="panel-body">

                    @include('backend.panel.page.form')

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
    <script src="{{ url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\PageRequest', '#my-form') !!}
    <script>
        $('select[name="locale"]').select2().select2('val', '{{ app()->getLocale() }}');
    </script>
    <script>
        $('select[name="locale"]').bind('change', function (e) {
            var a = "{{ route('admin.page.edit', $page->id) }}";
            var b = $(this).val();
            window.location.href = a + '?lang=' + b;
        });
    </script>
    <script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '{{ url('elfinder/ckeditor') }}',
            height: 300,
            removeButtons: 'Language,Smiley,About,NewPage',
            allowedContent: true,
            entities: false,
            htmlEncodeOutput: false
        });
    </script>
@endsection
