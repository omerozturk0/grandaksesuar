@extends('backend.layout.master')
@section('title', 'Sayfalar - Kontrol Paneli')
@section('subtitle', 'Sayfalar')
@section('breadcrumb', '
    <li><span>Sayfalar</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-page'))
                            <a href="{{ route('admin.page.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-pages'))
                            <a href="{{ route('admin.page.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Sayfalar</h2>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Adı</th>
                                @if(auth()->user()->hasRole('owner'))
                                    <th>Native</th>
                                @endif
                                <th>Tip</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $index => $page)
                                <tr @if(!$page->is_active) class="danger" @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>
                                        @if(isset($page->native))
                                            <span class="label label-success">{{ $page->native }}</span>
                                        @else
                                            <span class="label label-warning">Yok</span>
                                        @endif
                                    </td>
                                    <td>{{ $page->is_static ? 'Statik' : 'Normal' }}</td>
                                    <td>{{ \Date::parse($page->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-page'))
                                            <a href="{{ route('admin.page.edit', $page->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        <a href="{{ url('admin/page/'.$page->id.'/gallery') }}"><i
                                                    class="fa fa-image"></i></a>
                                        @if(Entrust::can('delete-page'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.page.destroy', $page->id) }}"
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
            {!! str_replace('/?', '?', $pages->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
