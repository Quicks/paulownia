<div class="form-group {{ $errors->has($locale.'['.$itemProperty.']') ? 'has-error' : ''}}">
    <label for="{{$locale.'['.$itemProperty.']'}}" class="control-label">
        {{ ucfirst($itemProperty).' ('.$locale.')'}}
    </label>

    <input class="form-control" 
        @if($locale == 'ar') 
            dir="rtl" 
            class="text-right" 
        @endif
        name="{{$locale.'['.$itemProperty.']'}}" 
        type="text"
        id="{{$locale.'['.$itemProperty.']'}}"
        placeholder="@isset($placeholder) {{$placeholder}} @endisset" 
        value="{{ isset($item) && isset($item->translate($locale)->$itemProperty) ? $item->translate($locale)->$itemProperty : ''}}"
    >
    {!! $errors->first($locale.'['.$itemProperty.']', '<p class="help-block">:message</p>') !!}
</div>
