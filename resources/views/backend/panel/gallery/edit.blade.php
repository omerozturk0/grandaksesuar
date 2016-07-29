@extends('backend.layout.master')
@section('title', 'Fotoğraf Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>Fotoğraf Galerisi</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::model($imgInfo, ['class' => 'form-horizontal form-bordered', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ url('admin/'.$module.'/'.$id.'/gallery') }}" data-toggle="tooltip"
                           data-original-title="Galeri"
                           class="fa fa-image"></a>
                    </div>

                    <h2 class="panel-title">Fotoğraf Düzenle</h2>
                    @if($imgInfo->str)
                        <p class="panel-subtitle">
                            {{ $imgInfo->str }} <i class="fa fa-level-up"></i>
                        </p>
                    @endif
                </header>
                <div class="panel-body">

                    @if(settings('multi_lang') == 1)
                        <div class="form-group">
                            {!! Form::label('locale', 'Dil', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                <select name="locale" id="locale" class="form-control input-sm populate"
                                        data-plugin-selectTwo>
                                    @foreach($languages as $locale => $parameters)
                                        <option value="{{ $locale }}">{{ $parameters['native'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('title', 'Başlık', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('title', null, ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('title','<label for="title" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('dsc', 'Açıklama', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('dsc', null, ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength']) !!}
                            {!! $errors->first('dsc','<label for="dsc" class="error">:message</label>') !!}
                        </div>
                    </div>

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
    <script src="{{ url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script>
        $('select[name="locale"]').select2().select2('val', '{{ app()->getLocale() }}');
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\ImageInfoRequest', '#my-form') !!}
    <script>
        $('select[name="locale"]').bind('change', function (e) {
            var a = "{{ url('admin/'.$module.'/'.$id.'/gallery/edit-image/'.$img_id) }}";
            var b = $('select[name="locale"]').select2().select2('val');
            window.location.href = a + '?lang=' + b;
        });
    </script>
@endsection