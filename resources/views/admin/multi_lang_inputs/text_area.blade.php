<div class="form-group {{ $errors->has($locale.'['.$itemProperty.']') ? 'has-error' : ''}}">
    <label for="{{$locale.'['.$itemProperty.']'}}" class="control-label">

        <span>@lang("admin.form.".$itemProperty)</span>
        <span>( {{($locale)}} )</span>

    </label>
    <textarea class="form-control @isset($translate) {{$translate}} @endisset" 
        @if($locale == 'ar') dir="rtl" class="text-right" @endif
        name="{{isset($name) ? $name : ($locale.'['.$itemProperty.']')}}"
        id="{{isset($name) ? $name : ($locale.'['.$itemProperty.']')}}" rows="3"
    >
        {{isset($item) && isset($item->translate($locale)->$itemProperty) ? $item->translate($locale)->$itemProperty : ''}}
    </textarea>
    {!! $errors->first($locale.'['.$itemProperty.']', '<p class="help-block">:message</p>') !!}
</div>