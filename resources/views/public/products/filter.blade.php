@push('css')
    <link rel="stylesheet" href="{{asset('css/filter-goods.css')}}?v2">
    <link rel="stylesheet" href="{{asset('css/breadcrumbs.css') }}?v2">
    <link rel="stylesheet" href="{{asset('css/ticker.css') }}?v2">
    <link rel="stylesheet" href="{{asset('css/products-price.css') }}?v2">
@endpush

<div class="row">
    <div class="col-12 fon-text-title pt-4 pb-4">
        <a href="{{route('main')}}" class="fon-text">@lang('header-footer.main')</a>/<a href="{{route('public.products.index')}}" class="fon-text">@lang('header-footer.goods')</a>
    </div>

    @if(!empty($ticker->text))
            <div class="col-12 pb-4 ticker-back">
                <marquee class="ticker-text" @if(App::getLocale() == 'ar') direction="right" @endif>
                    {!! $ticker->text !!}
                </marquee>
            </div>
    @endif
</div>



<div class="fon-for-goods">

    <div class="price-background">
        <div class="row">
            <div class="col-12" style="height: 220px">
                <div class="price-img-leaf-position">
                    <img class="price-img-leaf lazyload" data-src="{{asset('/images/service-leaf-tree.png')}}">
                </div>
                <div class="price-text mt-5">
                    @lang('products.price-text')
                    <a href="#">
                        <img src="{{asset('images/price-button.png')}}">
                    </a>
                </div>
            </div>
        </div>
    </div>

  <div class="row">
     <div class="col-sm-3">
        <ul class="style-for-list-goods ml-3">
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

    <div class="col-sm-9 ">
        <div class="row margin-for-products">
        @foreach($products as $product)
            @include('public.products.product-card', ['product' => $product])
        @endforeach
    </div>
</div>

</div>

</div>

@push('scripts')
    <link rel="stylesheet" href="{{asset('js/range-slider.js')}}">
@endpush
