@extends('backend.layout.master')
@section('title', 'Menüler - Kontrol Paneli')
@section('subtitle', 'Menüler')
@section('breadcrumb', '
    <li><span>Menüler</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-menu'))
                            <a href="{{ route('admin.menu.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-menus'))
                            <a href="{{ route('admin.menu.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Menüler</h2>
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
                                <th>Tarih</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $index => $menu)
                                <tr @if(!$menu->is_active) class="danger" @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $menu->name }}</td>
                                    @if(auth()->user()->hasRole('owner'))
                                        <td>
                                            @if(isset($menu->native))
                                                <code class="label-success">{{ $menu->native }}</code>
                                            @else
                                                <code class="label-warning">Yok</code>
                                            @endif
                                        </td>
                                    @endif
                                    <td>{{ \Date::parse($menu->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-menu'))
                                            <a href="{{ route('admin.menu.edit', $menu->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        @if(Entrust::can('delete-menu'))
                                            <a href="#modalIcon" data-href="{{ route('admin.menu.destroy', $menu->id) }}"
                                               class="delete-row delete-item modal-basic"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                        <a href="{{ route('admin.menu.child', $menu->id) }}"><i
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
            {!! str_replace('/?', '?', $menus->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
