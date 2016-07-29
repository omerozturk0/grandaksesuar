@if(isset($product))
    @foreach($product->pictures as $picture)
        <div class="form-group">
            <label class="col-md-3 control-label">{{ $picture->name }}</label>
            <div class="col-md-3">
                <a href="{{ url('userfiles/bigs/'.$picture->name) }}" target="_blank">
                    <img src="{{ url('userfiles/thumbs/'.$picture->name) }}" alt="{{ $picture->name }}" title="{{ $product->name }}" style="border: 1px solid #eee; border-radius: 5px;" />
                </a>
            </div>
            <div class="radio-custom col-md-1">
                <input type="radio" id="{{ 'image_'.$picture->id }}" name="default_image" value="{{ $picture->id }}" @if($picture->default_image) checked @endif>
                <label for="{{ 'image_'.$picture->id }}">Default Seç</label>
            </div>
            <div class="checkbox-custom checkbox-default col-md-1">
                <input type="checkbox" name="delete_images[]" id="delete_image_checkbox_{{ $picture->id }}" value="{{ $picture->id }}">
                <label for="delete_image_checkbox_{{ $picture->id }}">Resmi Sil</label>
            </div>
        </div>
    @endforeach
@endif

<div class="form-group">
    <label class="col-md-3 control-label">Resim Yükle</label>
    <div class="col-md-6">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-append">
                <div class="uneditable-input">
                    <i class="fa fa-file fileupload-exists"></i>
                    <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-default btn-file">
                    <span class="fileupload-exists">Değiştir</span>
                    <span class="fileupload-new">Seç</span>
                    <input type="file" name="file" />
                </span>
                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Sil</a>
            </div>
        </div>
    </div>
</div>
