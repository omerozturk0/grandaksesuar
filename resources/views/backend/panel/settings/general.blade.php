@extends('backend.layout.master')
@section('title', 'Genel Ayarlar - Kontrol Paneli')
@section('subtitle', 'Genel')
@section('breadcrumb', '
    <li><span>Ayarlar</span></li>
    <li><span>Genel</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'id' => 'my-form']) !!}

                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ route('admin.contact.create') }}" data-toggle="tooltip" data-original-title="Bağlantı Ekle"
                           class="fa fa-group"></a>
                    </div>

                    <h2 class="panel-title">Genel Ayarlar</h2>
                </header>
                <div class="panel-body">

                    <div class="form-group">
                        {!! Form::label('site_title', 'Site Başlığı', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('site_title', settings('site_title'), ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
                            {!! $errors->first('site_title','<label for="site_title" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('site_dsc', 'Açıklama', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('site_dsc', settings('site_dsc'), ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength']) !!}
                            {!! $errors->first('site_dsc','<label for="site_dsc" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('site_kyw', 'Anahtar Kelimeler', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('site_kyw', settings('site_kyw'), ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength']) !!}
                            {!! $errors->first('site_kyw','<label for="site_kyw" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('multi_lang', 'Çoklu Dil', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            <select name="multi_lang" id="multi_lang" class="form-control input-sm populate" data-plugin-selectTwo>
                                <option value="0">Kapalı</option>
                                <option value="1">Açık</option>
                            </select>
                        </div>
                    </div>

                    @foreach($contacts as $contact)
                        <div class="form-group">
                            {!! Form::label(null, $contact->name, ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                <div class="input-group">
                                    {!! Form::text(null, $contact->val, ['class' => 'form-control', 'disabled']) !!}
                                    <div class="input-group-btn">
                                        <button class="btn btn-default edit-item" data-href="{{ route('admin.contact.edit', $contact->id) }}" type="button" data-toggle="tooltip" data-original-title="Düzenle">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default delete-item modal-basic" href="#modalIcon" data-href="{{ route('admin.contact.destroy', $contact->id) }}" type="button" data-toggle="tooltip" data-original-title="Sil">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
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

            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'id' => 'my-form-2']) !!}

                <header class="panel-heading">

                    <h2 class="panel-title">İletişim Adresleri</h2>
                </header>
                <div class="panel-body">

                    <div class="form-group">
                        {!! Form::label('site_phone', 'Telefon Numarası', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('site_phone', settings('site_phone'), ['class' => 'form-control input-sm input-rounded', 'placeholder' => '(123) 123-1234', 'data-plugin-masked-input', 'data-input-mask' => '(999) 999-9999']) !!}
                            {!! $errors->first('site_phone','<label for="site_phone" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('site_fax', 'Fax', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('site_fax', settings('site_fax'), ['class' => 'form-control input-sm input-rounded', 'placeholder' => '(123) 123-1234', 'data-plugin-masked-input', 'data-input-mask' => '(999) 999-9999']) !!}
                            {!! $errors->first('site_fax','<label for="site_fax" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('site_email', 'E-mail Adresi', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('site_email', settings('site_email'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('site_email','<label for="site_email" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('site_no_reply_sender', 'No-reply Adresi', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('site_no_reply_sender', settings('site_no_reply_sender'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('site_no_reply_sender','<label for="site_no_reply_sender" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('site_adress', 'Açık Adres', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('site_adress', settings('site_adress'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('site_adress','<label for="site_adress" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('google_map_code', 'Google Map Kodu', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('google_map_code', settings('google_map_code'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('google_map_code','<label for="google_map_code" class="error">:message</label>') !!}
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

            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'id' => 'my-form-2']) !!}

                <header class="panel-heading">

                    <h2 class="panel-title">Normal Fotoğraf Boyutları</h2>
                </header>
                <div class="panel-body">

                    @if(!settings('normal_photos_width') AND !settings('normal_photos_height'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Boyutlar belirlenmediği taktirde <strong>800 x 600</strong> ölçüleri baz alınacaktır.
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('normal_photos_width', 'Genişlik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('normal_photos_width', settings('normal_photos_width'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('normal_photos_width','<label for="normal_photos_width" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('normal_photos_height', 'Yükseklik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('normal_photos_height', settings('normal_photos_height'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('normal_photos_height','<label for="normal_photos_height" class="error">:message</label>') !!}
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

            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'id' => 'my-form-2']) !!}

                <header class="panel-heading">

                    <h2 class="panel-title">Thumb Fotoğraf Boyutları</h2>
                </header>
                <div class="panel-body">

                    @if(!settings('thumb_photos_width') AND !settings('thumb_photos_height'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Boyutlar belirlenmediği taktirde <strong>300 x 300</strong> ölçüleri baz alınacaktır.
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('thumb_photos_width', 'Genişlik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('thumb_photos_width', settings('thumb_photos_width'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('thumb_photos_width','<label for="thumb_photos_width" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('thumb_photos_height', 'Yükseklik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('thumb_photos_height', settings('thumb_photos_height'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('thumb_photos_height','<label for="thumb_photos_height" class="error">:message</label>') !!}
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

            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'id' => 'my-form-2']) !!}

                <header class="panel-heading">

                    <h2 class="panel-title">Big Size Boyutları</h2>
                </header>
                <div class="panel-body">

                    @if(!settings('big_photos_width') AND !settings('big_photos_height'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Boyutlar belirlenmediği taktirde <strong>1920 x 1080</strong> ölçüleri baz alınacaktır.
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('big_photos_width', 'Genişlik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('big_photos_width', settings('big_photos_width'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('big_photos_width','<label for="big_photos_width" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('big_photos_height', 'Yükseklik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('big_photos_height', settings('big_photos_height'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('big_photos_height','<label for="big_photos_height" class="error">:message</label>') !!}
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

            <section class="panel">
                {!! Form::open(['class' => 'form-horizontal form-bordered', 'id' => 'my-form-2']) !!}

                <header class="panel-heading">

                    <h2 class="panel-title">Slider Boyutları</h2>
                </header>
                <div class="panel-body">

                    @if(!settings('slider_photos_width') AND !settings('slider_photos_height'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Boyutlar belirlenmediği taktirde <strong>1920 x 1080</strong> ölçüleri baz alınacaktır.
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('slider_photos_width', 'Genişlik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('slider_photos_width', settings('slider_photos_width'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('slider_photos_width','<label for="slider_photos_width" class="error">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('slider_photos_height', 'Yükseklik', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('slider_photos_height', settings('slider_photos_height'), ['class' => 'form-control input-sm input-rounded']) !!}
                            {!! $errors->first('slider_photos_height','<label for="slider_photos_height" class="error">:message</label>') !!}
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
    <script src="{{ url('assets/vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\SettingsRequest', '#my-form') !!}
    <script>
        $('.edit-item').bind('click', function(){
            window.location.href = $(this).attr('data-href');
        })
    </script>
    <script>
        $('select[name="multi_lang"]').select2().select2('val', '{{ settings('multi_lang') }}');
    </script>
@endsection
