@if(!@$contact)
    <div class="form-group">
        {!! Form::label('type', 'Bağlantı Tipi', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            <select name="type" id="type" class="form-control input-sm populate" data-plugin-selectTwo>
                <option value="1">Numara</option>
                <option value="2">Adres</option>
                <option value="3">Sosyal Medya Bağlantısı</option>
                <option value="4">Email Adresi</option>
            </select>
        </div>
    </div>
@else
    <input type="hidden" name="type" value="{{ $contact->type }}" />
@endif

<div class="form-group">
    {!! Form::label('name', 'Bağlantı Adı', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control input-sm input-rounded', 'required']) !!}
        {!! $errors->first('name','<label for="name" class="error">:message</label>') !!}
    </div>
</div>

@if(Request::get('type') == 2 || @$contact->type == 2)
    <div class="form-group">
        {!! Form::label('val', 'Adres', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('val', null, ['class' => 'form-control input-sm input-rounded', 'rows' => 5, 'maxlength' => 255, 'data-plugin-maxlength', 'required']) !!}
            {!! $errors->first('val','<label for="val" class="error">:message</label>') !!}
        </div>
    </div>
@elseif(Request::get('type') == 3 || @$contact->type == 3)
    <div class="form-group">
        {!! Form::label('val', 'Sosyal Medya Linki', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::url('val', null, ['class' => 'form-control input-sm input-rounded', 'required', 'placeholder' => 'https://www.facebook.com']) !!}
            {!! $errors->first('val','<label for="val" class="error">:message</label>') !!}
        </div>
    </div>
@elseif(Request::get('type') == 4 || @$contact->type == 4)
    <div class="form-group">
        {!! Form::label('val', 'Email Adresi', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::email('val', null, ['class' => 'form-control input-sm input-rounded', 'required', 'placeholder' => 'info@birisi.com']) !!}
            {!! $errors->first('val','<label for="val" class="error">:message</label>') !!}
        </div>
    </div>
@else
    <div class="form-group">
        {!! Form::label('val', 'Numara', ['class' => 'col-md-3 control-label', 'required']) !!}
        <div class="col-md-6">
            {!! Form::text('val', null, ['class' => 'form-control input-sm input-rounded', 'placeholder' => '(123) 123-1234', 'data-plugin-masked-input', 'data-input-mask' => '(999) 999-9999']) !!}
            {!! $errors->first('val','<label for="val" class="error">:message</label>') !!}
        </div>
    </div>
@endif