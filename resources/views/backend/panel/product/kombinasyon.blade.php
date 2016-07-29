<div class="col-md-4">
    <h4>Müşteri Grupları</h4>
    <hr>
    @foreach($product->customergroups as $customergroup)
        <div class="checkbox-custom checkbox-default combination_customergroups_wrapper">
            <input type="checkbox" name="combination_customergroups[]" id="combination_customergroup_checkbox_{{ $customergroup->id }}" class="combination_customergroups" value="{{ $customergroup->id }}" data-variable-title="{{ $customergroup->title }}">
            <label for="combination_customergroup_checkbox_{{ $customergroup->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $customergroup->depth) }}<i class="fa fa-angle-double-right"></i> {{ $customergroup->title }}</label>
        </div>
    @endforeach
</div>

<div class="col-md-4">
    <h4>Öznitelikler</h4>
    <hr>
    @foreach($product->attributes->where('parent_id', null) as $attribute)
        <div class="checkbox-custom checkbox-default combination_attributes_wrapper">
            <input type="checkbox" name="combination_attributes[]" id="combination_attribute_checkbox_{{ $attribute->id }}" value="{{ $attribute->id }}" class="combination_attributes" data-variable-title="{{ $attribute->title }}">
            <label for="combination_attribute_checkbox_{{ $attribute->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $attribute->depth) }}<i class="fa fa-angle-double-right"></i> {{ $attribute->title }}</label>
        </div>
        @foreach($product->attributes->where('parent_id', $attribute->id) as $child)
            <div class="checkbox-custom checkbox-default combination_attributes_wrapper">
                <input type="checkbox" name="combination_attributes[]" id="combination_attribute_checkbox_{{ $child->id }}" value="{{ $child->id }}" class="combination_attributes" data-variable-title="{{ $child->title }}" data-parent-id="{{ $child->parent_id }}">
                <label for="combination_attribute_checkbox_{{ $child->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $child->depth) }}<i class="fa fa-angle-double-right"></i> {{ $child->title }}</label>
            </div>
        @endforeach
    @endforeach
</div>

<div class="col-md-4">
    <h4>Kombinasyonlar</h4>
    <hr>
    <select class="form-control" name="combinations[]" id="combinations" multiple>
        @foreach($product->customergroups as $customergroup)
            @foreach($customergroup->combinations->where('parent_id', null) as $combination)
                <option value="{{ $customergroup->id.'-'.$combination->id }}">{{ $customergroup->title.' - '.$combination->title }}</option>
                @foreach($customergroup->combinations->where('parent_id', $combination->id) as $child)
                    <option value="{{ $customergroup->id.'-'.$child->id }}">{{ $customergroup->title.' - '.$child->title }}</option>
                @endforeach
            @endforeach
        @endforeach
    </select>
    <br>
    <button type="button" class="btn btn-primary" id="add_combinations">Ekle</button>
    <button type="button" class="btn btn-danger" id="delete_combinations">Sil</button>
</div>

<div class="clearfix"></div>
