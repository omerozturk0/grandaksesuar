@extends('backend.layout.master')
@section('title', 'Fotoğraf Yükle - Kontrol Paneli')
@section('subtitle', 'Fotoğraf Yükle')
@section('breadcrumb', '
    <li><span>Fotoğraf Galerisi</span></li>
    <li><span>Fotoğraf Yükle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">

                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ url('admin/'.$module.'/'.$id.'/gallery') }}" data-toggle="tooltip"
                           data-original-title="Galeri"
                           class="fa fa-image"></a>
                    </div>

                    <h2 class="panel-title">Fotoğraf Yükle</h2>
                </header>
                <div class="panel-body">

                    <form action="{{ url('admin/'.$module.'/'.$id.'/gallery/upload') }}" class="dropzone dz-square"
                          id="dropzone-example" method="post">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        @if($page->has_slider)
                            <input type="hidden" name="has_slider" value="1">
                        @endif
                    </form>

                </div>

            </section>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('assets/vendor/dropzone/css/basic.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/vendor/dropzone/css/dropzone.css') }}"/>
@endsection
@section('js')
    <script src="{{ url('assets/vendor/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            }
        };
    </script>
@endsection