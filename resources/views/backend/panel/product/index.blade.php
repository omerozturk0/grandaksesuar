@extends('backend.layout.master')
@section('title', 'Ürünler - Kontrol Paneli')
@section('subtitle', 'Ürünler')
@section('breadcrumb', '
    <li><span>Ürünler</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-product'))
                            <a href="{{ route('admin.product.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-products'))
                            <a href="{{ route('admin.product.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Ürünler</h2>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Adı</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index => $product)
                                <tr @if(!$product->is_active) class="danger" @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ \Date::parse($product->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-product'))
                                            <a href="{{ route('admin.product.edit', $product->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        <a href="{{ url('admin/product/'.$product->id.'/gallery') }}"><i
                                                    class="fa fa-image"></i></a>
                                        @if(Entrust::can('delete-product'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.product.destroy', $product->id) }}"
                                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-12">
            {!! str_replace('/?', '?', $products->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
