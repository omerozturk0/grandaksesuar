@if(Request::is('admin/menu/*/edit') AND settings('multi_lang') == 1)
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

<div class="form-group">
    {!! Form::label('name', 'Ad', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('name','<label for="name" class="error">:message</label>') !!}
    </div>
</div>

@if(!Request::get('lang'))
<div class="form-group">
    {!! Form::label('parent_id', 'Üst Menü', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <select name="parent_id" id="parent_id" class="form-control input-sm populate" data-plugin-selectTwo>
            <option value="">Yok</option>
            <optgroup label="Menüler">
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" @if(isset($parent) AND $parent == $menu->id) selected @endif>{{ str_repeat('--', $menu->depth).$menu->name }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
</div>

<div class="form-group">
    {!! Form::label('post_id', 'Bağlantı', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <select name="post_id" id="post_id" class="form-control input-sm populate" data-plugin-selectTwo>
            <option value="">Yok</option>
            <optgroup label="Sayfalar">
                @foreach($pages as $page)
                    <option value="{{ $page->id }}">{{ $page->name }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
</div>

<div class="form-group">
    {!! Form::label('special_url', 'Özel Bağlantı', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('special_url', null, ['class' => 'form-control input-sm input-rounded', 'placeholder' => url('/')]) !!}
        {!! $errors->first('special_url','<label for="name" class="error">:message</label>') !!}
    </div>
</div>
@endif

@if(auth()->user()->hasRole('owner'))
    <div class="form-group">
        {!! Form::label('native', 'Native', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('native', null, ['class' => 'form-control input-sm input-rounded']) !!}
            {!! $errors->first('native','<label for="name" class="error">:message</label>') !!}
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('is_active', 'Aktif', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        <div class="switch switch-sm switch-success">
            {!! Form::checkbox('is_active', true, null, ['data-plugin-ios-switch']) !!}
        </div>
    </div>
</div>
