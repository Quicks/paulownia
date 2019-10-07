<div class="form-group {{ $errors->has($locale.'['.$itemProperty.']') ? 'has-error' : ''}}">
    <label for="{{$locale.'['.$itemProperty.']'}}" class="control-label">

        {{ isset($itemName) ? $itemName . ' ('.$locale.')' : ucfirst($itemProperty).' ('.$locale.')' }}

    </label>
    <textarea class="form-control @isset($translate) {{$translate}} @endisset" 
        @if($locale == 'ar') dir="rtl" class="text-right" @endif
        name="{{$locale.'['.$itemProperty.']'}}"
        id="{{$locale.'['.$itemProperty.']'}}" rows="3"
    >
        {{isset($item) && isset($item->translate($locale)->$itemProperty) ? $item->translate($locale)->$itemProperty : ''}}
    </textarea>
    {!! $errors->first($locale.'['.$itemProperty.']', '<p class="help-block">:message</p>') !!}
</div>