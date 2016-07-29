@extends('backend.layout.master')
@section('title', 'Roller - Kontrol Paneli')
@section('subtitle', 'Roller')
@section('breadcrumb', '
    <li><span>Roller</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-role'))
                            <a href="{{ route('admin.role.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-roles'))
                            <a href="{{ route('admin.role.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Roller</h2>
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
                            @foreach($roles as $index => $role)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ \Date::parse($role->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-role'))
                                            <a href="{{ route('admin.role.edit', $role->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        @if(Entrust::can('delete-role'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.role.destroy', $role->id) }}"
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
            {!! str_replace('/?', '?', $roles->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
