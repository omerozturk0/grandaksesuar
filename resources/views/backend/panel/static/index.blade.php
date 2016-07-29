@extends('backend.layout.master')
@section('title', 'Static İçerikler - Kontrol Paneli')
@section('subtitle', 'Statik İçerikler')
@section('breadcrumb', '
    <li><span>Statik İçerikler</span></li>
')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        @if(Entrust::can('add-static'))
                            <a href="{{ route('admin.static.create') }}" data-toggle="tooltip" data-original-title="Ekle"
                               class="fa fa-plus"></a>
                        @endif
                        @if(Entrust::can('list-statics'))
                            <a href="{{ route('admin.static.index') }}" data-toggle="tooltip" data-original-title="Listele"
                               class="fa fa-th-list"></a>
                        @endif
                    </div>

                    <h2 class="panel-title">Statik İçerikler</h2>
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
                            @foreach($statics as $index => $static)
                                <tr @if(!$static->is_active) class="danger" @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $static->title }}</td>
                                    <td>
                                        @if(isset($static->native))
                                            <code class="label-success">{{ $static->native }}</code>
                                        @else
                                            <code class="label-warning">Yok</code>
                                        @endif
                                    </td>
                                    <td>{{ \Date::parse($static->created_at)->toFormattedDateString() }}</td>
                                    <td class="actions">
                                        @if(Entrust::can('edit-static'))
                                            <a href="{{ route('admin.static.edit', $static->id) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif
                                        @if(Entrust::can('delete-static'))
                                            <a href="#modalIcon"
                                               data-href="{{ route('admin.static.destroy', $static->id) }}"
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
            {!! str_replace('/?', '?', $statics->render()) !!}
        </div>
    </div>

    @include('backend.layout.modal', ['title' => 'Devam etmek istiyor musunuz?', 'content' => 'bu içeriği ve tüm alt içeriklerini sileceksiniz.'])

@endsection
