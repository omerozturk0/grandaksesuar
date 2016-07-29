@extends('backend.layout.master')
@section('title', 'Ürün Düzenle - Kontrol Paneli')
@section('subtitle', 'Düzenle')
@section('breadcrumb', '
    <li><span>Ürünler</span></li>
    <li><span>Düzenle</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($product, ['class' => 'form-horizontal form-bordered', 'route' => ['admin.product.update', $product->id], 'method' => 'PATCH', 'id' => 'my-form', 'enctype' => 'multipart/form-data']) !!}
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#popular" data-toggle="tab"><i class="fa fa-info-circle"></i> Ürün Bilgileri</a>
                    </li>
                    <li>
                        <a href="#price" data-toggle="tab"><i class="fa fa-try"></i> Fiyat</a>
                    </li>
                    @if(count($categories))
                        <li>
                            <a href="#category" data-toggle="tab"><i class="fa fa-bars"></i> Kategori</a>
                        </li>
                    @endif
                    @if(count($attributes))
                        <li>
                            <a href="#attribute" data-toggle="tab"><i class="fa fa-check-square-o"></i> Öznitelikler</a>
                        </li>
                    @endif
                    @if(count($customergroups))
                        <li>
                            <a href="#customergroup" data-toggle="tab"><i class="fa fa-users"></i> Müşteri Grupları</a>
                        </li>
                    @endif
                    @if(count($product->customergroups) && count($product->attributes))
                        <li>
                            <a href="#combination" data-toggle="tab"><i class="fa fa-random"></i> Kombinasyonlar</a>
                        </li>
                    @endif
                    <li>
                        <a href="#image" data-toggle="tab"><i class="fa fa-image"></i> Ürün Fotoğrafları</a>
                    </li>
                    @if(Entrust::can('add-product'))
                        <li>
                            <a href="{{ route('admin.product.create') }}"><i class="fa fa-plus"></i> Ekle</a>
                        </li>
                    @endif
                    @if(Entrust::can('list-products'))
                        <li>
                            <a href="{{ route('admin.product.index') }}"><i class="fa fa-th-list"></i> Listele</a>
                        </li>
                    @endif
                    @if(Entrust::can('delete-product'))
                        <li>
                            <a href="#modalIcon"
                               data-href="{{ route('admin.product.destroy', $product->id) }}"
                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i> Sil</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    @if(Request::is('admin/product/*/edit') AND settings('multi_lang') == 1)
                        <div class="form-group">
                            {!! Form::label('locale', 'Dil', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                <select name="locale" id="locale" class="form-control input-sm populate" data-plugin-selectTwo>
                                    @foreach($languages as $locale => $parameters)
                                        <option value="{{ $locale }}">{{ $parameters['native'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div id="popular" class="tab-pane active">
                        @include('backend.panel.product.form')
                    </div>
                    <div id="price" class="tab-pane">
                        @include('backend.panel.product.fiyat')
                    </div>
                    @if(count($categories))
                        <div id="category" class="tab-pane">
                            @include('backend.panel.product.Kategori')
                        </div>
                    @endif
                    @if(count($attributes))
                        <div id="attribute" class="tab-pane">
                            @include('backend.panel.product.oznitelik')
                        </div>
                    @endif
                    @if(count($customergroups))
                        <div id="customergroup" class="tab-pane">
                            @include('backend.panel.product.musterigrubu')
                        </div>
                    @endif
                    @if(count($product->customergroups) && count($product->attributes))
                        <div id="combination" class="tab-pane">
                            @include('backend.panel.product.kombinasyon')
                        </div>
                    @endif
                    <div id="image" class="tab-pane">
                        @include('backend.panel.product.fotograf')
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                {!! Form::submit('Kaydet', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('assets/vendor/select2/select2.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}"/>
@endsection
@section('js')
    <script src="{{ url('assets/vendor/select2/select2.js') }}"></script>
    <script src="{{ url('assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! \JsValidator::formRequest('App\Http\Requests\Backend\ProductRequest', '#my-form') !!}
    <script>
        $('select[name="locale"]').select2().select2('val', '{{ app()->getLocale() }}');
    </script>
    <script>
        $('select[name="locale"]').bind('change', function (e) {
            var a = "{{ route('admin.product.edit', $product->id) }}";
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
    <script type="text/javascript">
        $(function(){
            $('.category_checkbox').bind('click', function () {
                $value = $(this).attr('value');
                $('#category').find('input[data-parent-id='+$value+']').prop('checked', this.checked);
            });
            $('.attribute_checkbox').bind('click', function () {
                $value = $(this).attr('value');
                $('#attribute').find('input[data-parent-id='+$value+']').prop('checked', this.checked);
            });
            $('.combination_attributes').bind('click', function () {
                $value = $(this).attr('value');
                $('.combination_attributes_wrapper').find('input[data-parent-id='+$value+']').prop('checked', this.checked);
            });
            $('#delete_combinations').bind('click', function () {
                $('#combinations').find(':selected').remove();
                $('#combination').find(':checkbox').prop('checked', '');
            });
            $('#add_combinations').bind('click', function () {
                $customergroup_id = $('.combination_customergroups:checked').val();
                $customergroup_title = $('.combination_customergroups:checked').attr('data-variable-title');
                $('.combination_attributes:checked').each(function(){
                    $current_attribute_id = $(this).val();
                    $current_attribute_title = $(this).attr('data-variable-title');
                    if ($customergroup_id != undefined && $current_attribute_id != undefined) {
                        if ($('#combinations').find('option[value='+$customergroup_id+'-'+$current_attribute_id+']').length == 0) {
                            $('#combinations').append('<option value="'+$customergroup_id+'-'+$current_attribute_id+'">'+$customergroup_title+' - '+$current_attribute_title+'</option>');
                        }
                    }
                });
                $('#combination').find(':checkbox').prop('checked', '');
            });
            $('.combination_customergroups').bind('click', function () {
                $customergroup_count = $('.combination_customergroups:checked').length;
                if ($customergroup_count > 1) {
                    return false;
                }
            });
            $('input[type=submit]').bind('click', function () {
                $('#combination option').each(function(){
                    $('#combination').find(':checkbox').prop('checked', '');
                    $(this).prop('selected', 'selected');
                });
            });
        });
    </script>
@endsection
