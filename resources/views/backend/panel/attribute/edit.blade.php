@extends('backend.layout.master')
@section('title', 'Öznitelik Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>Öznitelikler</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($attribute, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.attribute.update', $attribute->id], 'method' => 'PATCH', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-attribute'))
                            <a href="{{ route('admin.attribute.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-attributes'))
                            <a href="{{ route('admin.attribute.index') }}" data-toggle="tooltip"
                               data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                        @if(Entrust::can('delete-attribute'))
                            <a href="#modalIcon"
                               data-href="{{ route('admin.attribute.destroy', $attribute->id) }}"
                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Öznitelik Düzenle</h2>

                    @if($attribute->title)
                    <p class="panel-subtitle">
                        {{ $attribute->title }} <i class="fa fa-level-up"></i>
                    </p>
                    @endif
                </header>
                <div class="panel-body">

                    @include('backend.panel.attribute.form')

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
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\AttributeRequest', '#my-form') !!}
    <script>
        $('select[name="parent_id"]').select2().select2('val', '{{ $attribute->parent_id }}');
        $('select[name="locale"]').select2().select2('val', '{{ app()->getLocale() }}');
    </script>
    <script>
        $('select[name="locale"]').bind('change', function (e) {
            var a = "{{ route('admin.attribute.edit', $attribute->id) }}";
            var b = $(this).val();
            window.location.href = a+'?lang='+b;
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
