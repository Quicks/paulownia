
<?php $selectedOption = old($attribute->code) ?: $product[$attribute->code] ?>


<div class='col-sm-6'>
    <input type="radio" 
        id="{{$attribute->code}}checkbox"
        data-on-color="primary"
        name="{{$attribute->code}}"
        class="input-switch-alt "
        value="{{$selectedOption}}"
        checked=''
        data-size="medium"
        data-on-text="0"
        data-off-text="1">
</div>