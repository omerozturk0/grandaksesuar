@foreach($customergroups as $customergroup)
    <div class="checkbox-custom checkbox-default">
        <input type="checkbox" name="customergroups[]" id="customergroup_checkbox_{{ $customergroup->id }}" value="{{ $customergroup->id }}" class="customergroup_checkbox" @if(isset($product) AND !is_null($product->customergroups->where('id', $customergroup->id)->first())) checked @endif>
        <label for="customergroup_checkbox_{{ $customergroup->id }}">{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $customergroup->depth) }}<i class="fa fa-angle-double-right"></i> {{ $customergroup->title }}</label>
    </div>
@endforeach
