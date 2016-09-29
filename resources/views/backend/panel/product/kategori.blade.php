@foreach($categories as $category)
    <div class="checkbox-custom checkbox-default">
        <input type="checkbox" name="categories[]" id="category_checkbox_{{ $category->id }}" value="{{ $category->id }}" data-parent-id="{{ $category->parent_id }}" class="category_checkbox" @if(isset($product) AND !is_null($product->categories->where('id', $category->id)->first())) checked @endif>
        <label for="category_checkbox_{{ $category->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $category->depth) }}<i class="fa fa-angle-double-right"></i> {{ $category->name }}</label>
    </div>
@endforeach
