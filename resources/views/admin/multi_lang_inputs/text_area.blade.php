<div class="form-group {{ $errors->has($locale.'['.$itemProperty.']') ? 'has-error' : ''}}">
    <label for="{{$locale.'['.$itemProperty.']'}}" class="control-label">
        @if($itemProperty == 'desc')
            {{ ucfirst($itemProperty).'ription' . ' ('.$locale.')'}}
        @else
            {{ ucfirst($itemProperty).' ('.$locale.')'}}
        @endif
    </label>
    <textarea class="form-control" 
        @if($locale == 'ar') dir="rtl" class="text-right" @endif
        name="{{$locale.'['.$itemProperty.']'}}"
        id="{{$locale.'['.$itemProperty.']'}}" rows="3"
    >
        {{isset($item) && isset($item->translate($locale)->$itemProperty) ? $item->translate($locale)->$itemProperty : ''}}
    </textarea>
    {!! $errors->first($locale.'['.$itemProperty.']', '<p class="help-block">:message</p>') !!}
</div>