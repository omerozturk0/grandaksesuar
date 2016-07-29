@if(Request::is('admin/page/*/edit') AND settings('multi_lang') == 1)
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

<div class="form-group">
    {!! Form::label('title', 'Başlık', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control input-sm input-rounded']) !!}
        {!! $errors->first('title','<label for="title" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('dsc', 'Açıklama', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('dsc', null, ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength']) !!}
        {!! $errors->first('dsc','<label for="dsc" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('kyw', 'Anahtar Kelimeler', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('kyw', null, ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength']) !!}
        {!! $errors->first('kyw','<label for="kyw" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'İçerik', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content', null, ['id' => 'editor1']) !!}
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
        {!! Form::label('is_static', 'Statik Sayfa?', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-9">
            <div class="switch switch-sm switch-success">
                {!! Form::checkbox('is_static', true, null, ['data-plugin-ios-switch']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('has_slider', 'Slider?', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-9">
            <div class="switch switch-sm switch-success">
                {!! Form::checkbox('has_slider', true, null, ['data-plugin-ios-switch']) !!}
            </div>
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
