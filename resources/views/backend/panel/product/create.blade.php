@extends('backend.layout.master')
@section('title', 'Yeni Ürün - Kontrol Paneli')
@section('subtitle', 'Yeni')
@section('breadcrumb', '
    <li><span>Ürünler</span></li>
    <li><span>Yeni</span></li>
')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section class="panel">

                <div class="col-md-12">
                    {!! Form::open(['class' => 'form-horizontal form-bordered', 'route' => 'admin.product.store', 'files' => true, 'id' => 'my-form']) !!}
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
                            <div id="image" class="tab-pane">
                                @include('backend.panel.product.fotograf')
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        {!! Form::submit('Ekle', ['class' => 'btn btn-success']) !!}
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </section>
        </div>
    </div>

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
            })
        });
    </script>
@endsection
