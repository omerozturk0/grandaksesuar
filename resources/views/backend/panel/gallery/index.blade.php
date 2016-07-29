@extends('backend.layout.master')
@section('title', 'Fotoğraf Galerisi - Kontrol Paneli')
@section('subtitle', 'Fotoğraf Galerisi')
@section('breadcrumb', '
    <li><span>Fotoğraf Galerisi</span></li>
')
@section('content')

    <section class="content-with-menu content-with-menu-has-toolbar media-gallery">
        <div class="content-with-menu-container">
            <div class="inner-menu-toggle">
                <a href="#" class="inner-menu-expand" data-open="inner-menu">
                    Show Bar <i class="fa fa-chevron-right"></i>
                </a>
            </div>

            <menu id="content-menu" class="inner-menu" role="menu">
                <div class="nano">
                    <div class="nano-content">

                        <div class="inner-menu-toggle-inside">
                            <a href="#" class="inner-menu-collapse">
                                <i class="fa fa-chevron-up visible-xs-inline"></i><i
                                        class="fa fa-chevron-left hidden-xs-inline"></i> Gizle
                            </a>
                            <a href="#" class="inner-menu-expand" data-open="inner-menu">
                                Gizle <i class="fa fa-chevron-down"></i>
                            </a>
                        </div>

                        <div class="inner-menu-content">

                            <a class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md"
                               href="{{ url('admin/'.$module.'/'.$id.'/gallery/upload') }}">
                                <i class="fa fa-upload mr-xs"></i>
                                Fotoğraf Yükle
                            </a>

                            <hr class="separator"/>
                        </div>
                    </div>
                </div>
            </menu>
            <div class="inner-body mg-main">

                <div class="inner-toolbar clearfix">
                    <ul>
                        <li>
                            <a id="mgSelectAll" href="#"><i class="fa fa-check-square"></i> <span
                                        data-none-text="Seçimi Kaldır" data-all-text="Tümünü Seç">Tümünü Seç</span></a>
                        </li>
                        <li>
                            <a href="#" onclick="multiDelete()"><i class="fa fa-trash-o"></i> Sil</a>
                        </li>
                    </ul>
                </div>

                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    @foreach($pictures as $picture)
                        <div class="isotope-item image col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail">
                                <div class="thumb-preview">
                                    <a class="thumb-image" href="{{ url('userfiles/images/'.$picture->name) }}">
                                        <img src="{{ url('userfiles/thumbs/'.$picture->name) }}" class="img-responsive"
                                             alt="Project">
                                    </a>

                                    <div class="mg-thumb-options">
                                        <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                        <div class="mg-toolbar">
                                            <div class="mg-option checkbox-custom checkbox-inline">
                                                <input type="checkbox" id="image_{{ $picture->id }}" name="image[]"
                                                       value="{{ $picture->id }}">
                                                <label for="image_{{ $picture->id }}">Seç</label>
                                            </div>
                                            <div class="mg-group pull-right">
                                                <a href="{{ url('admin/'.$module.'/'.$id.'/gallery/edit-image/'.$picture->id) }}">Düzenle</a>
                                                <button data-toggle="dropdown" type="button"
                                                        class="dropdown-toggle mg-toggle">
                                                    <i class="fa fa-caret-up"></i>
                                                </button>
                                                <ul role="menu" class="dropdown-menu mg-menu">
                                                    <li><a href="{{ url('download/images/'.$picture->name) }}"><i class="fa fa-download"></i> Download</a></li>
                                                    <li>
                                                        <a href="#modalIcon" class="delete-item modal-basic" data-href="{{ url('admin/'.$module.'/'.$id.'/gallery/delete/'.$picture->id) }}">
                                                            <i class="fa fa-trash-o"></i> Sil
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mg-title text-semibold">
                                    @if($picture->title)
                                        {{ $picture->title }}
                                    @else
                                        {{ str_limit($picture->name, 10) }}
                                        <small>{{ $picture->extension }}</small>
                                    @endif
                                </h5>
                                <div class="mg-description">
                                    <small class="pull-right text-muted">{{ \Date::parse($picture->created_at)->toFormattedDateString() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('/assets/vendor/isotope/jquery.isotope.css') }}"/>
@endsection
@section('js')
    <script src="{{ url('/assets/vendor/isotope/jquery.isotope.js') }}"></script>
    <script src="{{ url('/assets/javascripts/pages/examples.mediagallery.js') }}"></script>
    <script>
        function multiDelete() {
            var images = $('input[name="image[]"]:checked').map(function () {
                return $(this).val();
            }).get();

            if (images.length > 0) {
                $.ajax({
                    url: "{{ url('admin/'.$module.'/'.$id.'/gallery/multi-delete') }}",
                    method: "POST",
                    data: {_token: $('meta[name="csrf"]').attr('content'), images: images},
                    success: function (r) {
                        window.location.href = r;
                    }
                });
            }
        }
    </script>
@endsection
