@foreach($categories->where('parent_id', null) as $category)
    <div class="checkbox-custom checkbox-default">
        <input type="checkbox" name="categories[]" id="category_checkbox_{{ $category->id }}" value="{{ $category->id }}" class="category_checkbox" @if(isset($product) AND !is_null($product->categories->where('id', $category->id)->first())) checked @endif>
        <label for="category_checkbox_{{ $category->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $category->depth) }}<i class="fa fa-angle-double-right"></i> {{ $category->name }}</label>
    </div>
    @foreach($categories->where('parent_id', $category->id) as $child)
        <div class="checkbox-custom checkbox-default">
            <input type="checkbox" name="categories[]" id="category_checkbox_{{ $child->id }}" value="{{ $child->id }}" data-parent-id="{{ $child->parent_id }}" class="category_checkbox" @if(isset($product) AND !is_null($product->categories->where('id', $child->id)->first())) checked @endif>
            <label for="category_checkbox_{{ $child->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $child->depth) }}<i class="fa fa-angle-double-right"></i> {{ $child->name }}</label>
        </div>
    @endforeach
@endforeach
