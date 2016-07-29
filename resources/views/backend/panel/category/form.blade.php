@if(Request::is('admin/category/*/edit') AND settings('multi_lang') == 1)
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
    {!! Form::label('name', 'Başlık', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('name','<label for="name" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('dsc', 'Açıklama', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('dsc', null, ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength']) !!}
        {!! $errors->first('dsc','<label for="dsc" class="error">:message</label>') !!}
    </div>
</div>

@if(!Request::get('lang'))
<div class="form-group">
    {!! Form::label('parent_id', 'Üst Özniteik', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <select name="parent_id" id="parent_id" class="form-control input-sm populate" data-plugin-selectTwo>
            <option value="">Yok</option>
            <optgroup label="Öznitelikler">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(isset($parent) AND $parent == $category->id) selected @endif>{{ str_repeat('--', $category->depth).$category->name }}</option>
                @endforeach
            </optgroup>
        </select>
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
