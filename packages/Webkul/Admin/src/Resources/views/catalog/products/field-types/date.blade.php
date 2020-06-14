<input class="form-control bsdatepicker col-sm-6" name="{{ $attribute->code }}" type="text"
    value="{{ old($attribute->code) ?: $product[$attribute->code] }}" data-date-format='yyyy-mm-dd'>
