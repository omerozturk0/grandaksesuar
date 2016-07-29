@if(Request::is('admin/static/*/edit') AND settings('multi_lang') == 1)
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
    {!! Form::label('title', 'Başlık', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('title','<label for="title" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'İçerik', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content', null, ['id' => 'editor1']) !!}
        {!! $errors->first('content','<label for="content" class="error">:message</label>') !!}
    </div>
</div>

@if(auth()->user()->hasRole('owner'))
    <div class="form-group">
        {!! Form::label('native', 'Native', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('native', null, ['class' => 'form-control input-sm input-rounded']) !!}
            {!! $errors->first('native','<label for="name" class="error">:message</label>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Aktif', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-9">
            <div class="switch switch-sm switch-success">
                {!! Form::checkbox('is_active', true, null, ['data-plugin-ios-switch']) !!}
            </div>
        </div>
    </div>
@endif
