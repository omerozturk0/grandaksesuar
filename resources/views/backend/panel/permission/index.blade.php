@extends('backend.layout.master')
@section('title', 'İzinler - Kontrol Paneli')
@section('subtitle', 'İzinler')
@section('breadcrumb', '
    <li><span>İzinler</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-permission'))
                            <a href="{{ route('admin.permission.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-permissions'))
                            <a href="{{ route('admin.permission.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">İzinler</h2>
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
                            @foreach($permissions as $index => $permission)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $permission->display_name }}</td>
                                    <td>{{ \Date::parse($permission->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-permission'))
                                            <a href="{{ route('admin.permission.edit', $permission->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        @if(Entrust::can('delete-permission'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.permission.destroy', $permission->id) }}"
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
            {!! str_replace('/?', '?', $permissions->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
