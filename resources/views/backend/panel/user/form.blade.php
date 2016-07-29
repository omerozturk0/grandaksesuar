<div class="form-group">
    {!! Form::label('name', 'Ad Soyad', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('name','<label for="name" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email Adresi', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control input-sm input-rounded']) !!}
        {!! $errors->first('email','<label for="email" class="error">:message</label>') !!}
    </div>
</div>

@if((isset($user->id) AND auth()->user()->id === $user->id) AND Request::is('admin/user/*/edit'))
    <div class="form-group">
        {!! Form::label('old_password', 'Eski Parola', ['class' => 'col-md-3 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('old_password', ['class' => 'form-control input-sm input-rounded']) !!}
            {!! $errors->first('old_password','<label for="old_password" class="error">:message</label>') !!}
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('password', 'Parola', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control input-sm input-rounded']) !!}
        {!! $errors->first('password','<label for="password" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Parola Doğrulama', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control input-sm input-rounded']) !!}
        {!! $errors->first('password_confirmation','<label for="password_confirmation" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role', 'Kullnıcı Rolü', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <select name="role[]" id="role" class="form-control input-sm populate" data-plugin-selectTwo multiple placeholder="Rol Seçiniz">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" @if(isset($user) and $user->hasRole($role->name)) selected @endif>{{ $role->display_name }}</option>
            @endforeach
        </select>
        {!! $errors->first('role','<label for="role" class="error">:message</label>') !!}
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
