<div class="form-group">
    {!! Form::label('display_name', 'Ad', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('display_name', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('display_name','<label for="display_name" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Native', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('name','<label for="name" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Açıklama', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('description', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('description','<label for="description" class="error">:message</label>') !!}
    </div>
</div>
