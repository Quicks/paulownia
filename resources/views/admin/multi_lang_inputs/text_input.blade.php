<div class="form-group {{ $errors->has($locale.'['.$itemProperty.']') ? 'has-error' : ''}}">
    <label for="{{$locale.'['.$itemProperty.']'}}" class="control-label">
        <span>@lang("admin.form.".$itemProperty)</span>
        <span>( {{($locale)}} )</span>
    </label>

    <input class="form-control @isset($translate) {{$translate}} @endisset" 
        @if($locale == 'ar') 
            dir="rtl" 
            class="text-right" 
        @endif
        name="{{isset($name) ? $name : ($locale.'['.$itemProperty.']')}}" 
        type="text"
        id="{{isset($name) ? $name : ($locale.'['.$itemProperty.']')}}"
        placeholder="@isset($placeholder) {{$placeholder}} @endisset" 
        value="{{ isset($item) && isset($item->translate($locale)->$itemProperty) ? $item->translate($locale)->$itemProperty : ''}}"
    >
    {!! $errors->first($locale.'['.$itemProperty.']', '<p class="help-block">:message</p>') !!}
</div>
