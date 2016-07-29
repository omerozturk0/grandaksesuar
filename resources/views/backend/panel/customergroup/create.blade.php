@extends('backend.layout.master')
@section('title', 'Yeni Müşteri Grubu - Kontrol Paneli')
@section('subtitle', 'Yeni')
@section('breadcrumb', '
    <li><span>Müşteri Grupları</span></li>
    <li><span>Yeni</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'route' => 'admin.customergroup.store', 'files' => true, 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('list-customergroups'))
                            <a href="{{ route('admin.customergroup.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Müşteri Grubu Ekle</u></h2>
                </header>
                <div class="panel-body">

                    @include('backend.panel.customergroup.form')

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
    <script src="{{ url('assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script src="{{ url('assets/vendor/summernote/summernote.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\CustomerGroupRequest', '#my-form') !!}
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
