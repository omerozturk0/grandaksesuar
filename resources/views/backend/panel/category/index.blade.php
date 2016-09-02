@extends('backend.layout.master')
@section('title', 'Kategoriler - Kontrol Paneli')
@section('subtitle', 'Kategoriler')
@section('breadcrumb', '
    <li><span>Kategoriler</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-category'))
                            <a href="{{ route('admin.category.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-categories'))
                            <a href="{{ route('admin.category.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Kategoriler</h2>
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
                            @foreach($categories as $index => $category)
                                <tr @if(!$category->is_active) class="danger" @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ \Date::parse($category->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-category'))
                                            <a href="{{ route('admin.category.edit', $category->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        <a href="{{ url('admin/category/'.$category->id.'/pictures') }}?m=Category"><i
                                                    class="fa fa-image"></i></a>
                                        @if(Entrust::can('delete-category'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.category.destroy', $category->id) }}"
                                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                        <a href="{{ route('admin.category.child', $category->id) }}"><i
                                                    class="fa fa-level-down"></i></a>
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
            {!! str_replace('/?', '?', $categories->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
