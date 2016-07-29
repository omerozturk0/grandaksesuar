<div class="form-group">
    {!! Form::label('purchase_price', 'Alış Fiyatı', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('purchase_price', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('purchase_price','<label for="purchase_price" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('price', 'Fiyat', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('price', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('price','<label for="price" class="error">:message</label>') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('discount', 'İndirim Oranı (%)', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('discount', null, ['class' => 'form-control input-sm input-rounded', 'autofocus']) !!}
        {!! $errors->first('discount','<label for="discount" class="error">:message</label>') !!}
    </div>
</div>
