@extends('backend.layout.master')
@section('title', 'Öznitelikler - Kontrol Paneli')
@section('subtitle', 'Öznitelikler')
@section('breadcrumb', '
    <li><span>Öznitelikler</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-attribute'))
                            <a href="{{ route('admin.attribute.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-attributes'))
                            <a href="{{ route('admin.attribute.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Öznitelikler</h2>
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
                            @foreach($attributes as $index => $attribute)
                                <tr @if(!$attribute->is_active) class="danger" @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $attribute->title }}</td>
                                    <td>{{ \Date::parse($attribute->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-attribute'))
                                            <a href="{{ route('admin.attribute.edit', $attribute->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        @if(Entrust::can('delete-attribute'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.attribute.destroy', $attribute->id) }}"
                                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                        <a href="{{ route('admin.attribute.child', $attribute->id) }}"><i
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
            {!! str_replace('/?', '?', $attributes->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
