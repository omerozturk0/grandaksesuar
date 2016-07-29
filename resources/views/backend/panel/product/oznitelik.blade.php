@foreach($attributes->where('parent_id', null) as $attribute)
    <div class="checkbox-custom checkbox-default">
        <input type="checkbox" name="attributes[]" id="attribute_checkbox_{{ $attribute->id }}" value="{{ $attribute->id }}" class="attribute_checkbox" @if(isset($product) AND !is_null($product->attributes->where('id', $attribute->id)->first())) checked @endif>
        <label for="attribute_checkbox_{{ $attribute->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $attribute->depth) }}<i class="fa fa-angle-double-right"></i> {{ $attribute->title }}</label>
    </div>
    @foreach($attributes->where('parent_id', $attribute->id) as $child)
        <div class="checkbox-custom checkbox-default">
            <input type="checkbox" name="attributes[]" id="attribute_checkbox_{{ $child->id }}" value="{{ $child->id }}" data-parent-id="{{ $child->parent_id }}" class="attribute_checkbox" @if(isset($product) AND !is_null($product->attributes->where('id', $child->id)->first())) checked @endif>
            <label for="attribute_checkbox_{{ $child->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $child->depth) }}<i class="fa fa-angle-double-right"></i> {{ $child->title }}</label>
        </div>
    @endforeach
@endforeach
