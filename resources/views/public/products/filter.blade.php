@push('css')
    <link rel="stylesheet" href="{{asset('css/filter-goods.css') }}">
@endpush


<div class="fon-for-goods">
<div class="row flex-xl-nowrap pt-2">
    <div class="col-sm-4 bd-sidebar">

        <ul class="style-for-list-goods mt-5 ml-3">
            <li class="mt-4 mb-4 text-type">Seedlings</li>
            <li class="mt-4 mb-4 text-type">Trees</li>
            <li class="mt-4 mb-4 text-type">Wood</li>
            <li class="mt-4 mb-4 text-type">Fragment herbs</li>
            <li class="mt-4 mb-4 text-type">Exotic plants</li>
            <li class="mt-4 mb-4 text-type">Other</li>
            <li class="m-0">
                <hr class="lile-between mt-5 mb-5 ml-0 mr-0">
            </li>
            <li class="mt-4 mb-4 text-type-title">Discounts</li>
            <li>
                <form action="" method="">
                    <select name="type of paulownia" class="select-goods">
                        <option>type of paulownia</option>
                        <option value="1"> 1</option>
                        <option value="2"> 2</option>
                        <option value="3"> 3</option>
                        <option value="4"> 4</option>
                    </select>
                </form>
            </li>
            <li class="mt-4 text-type-title">Price €</li>
            <li class="text-type-prise">from 2 to 10</li>
            <li class="mb-5">
                <section class="range-slider">
                    <span class="rangeValues"></span>
                    <input value="2" min="2" max="10" step="1" type="range" class="slider" >
                    <input value="5" min="2" max="10" step="1" type="range" class="slider-1">
                </section>
            </li>
            <li class="mt-4 mb-4 text-type-rules">Purchase Rules </li>
            <li class="mt-4 text-type-title">A popular practice of our time is the sale of young plants
                in special containers growing in the ground.
                Such plants have a closed type of root system ...</li>
            <li>
                <a href="#" class="text-href">Read more</a>
            </li>
        </ul>
    </div>

    <div class="col-sm-8 bd-content">
        <div class="row">
        @foreach($products as $product)
            @include('public.products.product-card', ['product' => $product])
        @endforeach
    </div>
</div>

</div>

</div>

{{--@push('scripts')--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>--}}
{{--@endpush--}}

<script>

    function getVals(){
        // Get slider values
        var parent = this.parentNode;
        var slides = parent.getElementsByTagName("input");
        var slide1 = parseFloat( slides[0].value );
        var slide2 = parseFloat( slides[1].value );
        // Neither slider will clip the other, so make sure we determine which is larger
        if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }

        var displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = slide1 + " - " + slide2;
    }

    window.onload = function(){
        // Initialize Sliders
        var sliderSections = document.getElementsByClassName("range-slider");
        for( var x = 0; x < sliderSections.length; x++ ){
            var sliders = sliderSections[x].getElementsByTagName("input");
            for( var y = 0; y < sliders.length; y++ ){
                if( sliders[y].type ==="range" ){
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }

</script>