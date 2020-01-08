@push('css')
    <link rel="stylesheet" href="{{asset('css/filter-goods.css')}}?v6">
    <link rel="stylesheet" href="{{asset('css/ticker.css') }}?v2">
    <link rel="stylesheet" href="{{asset('css/products-price.css') }}?v2">
@endpush

    <div class="row" style="background: white">

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
                        <div class="col-12" style="height: 200px">
                            <div class="price-img-leaf-position">
                                <img class="price-img-leaf lazyload"
                                     data-src="{{asset('/images/service-leaf-tree.png')}}">
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
    <div class="col">
        <div class="row pb-5">
            <div class="col-sm-3">
                <ul class="style-for-list-goods ml-3 sticky-top">
                    @foreach($categories as $category)
                        <a @if(Request::input('category') === $category->slug)
                           class="style-for-list-goods-link-active"
                           @else class="style-for-list-goods-link" @endif
                           href="{{route('public.products.index'). "?category=" . $category->slug}}">
                            <li class="mt-4 mb-4 text-type">{{$category->name}}</li>
                        </a>
                    @endforeach
                <li class="m-0">
                     <hr class="lile-between mt-5 mb-5 ml-0 mr-0">
                </li>
                <li class="mt-4 mb-4 text-type-title">@lang('products.discounts')</li>
                <li>
                    <select id="paulowniaType" class="select-goods">
                        <option selected disabled hidden>@lang('products.type-of-paulownia')</option>
                        @foreach($types as $type)
                            <option value="{{$type->admin_name}}"> {{$type->admin_name}}</option>
                        @endforeach
                    </select>

                </li>
                <li class="mt-4 text-type-title">Price {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}</li>
                <li class="text-type-prise">
                    from {{number_format($products->min('price'), 2)}}
                    to {{number_format($products->max('price'), 2)}}
                </li>
                <li class="mb-5">
                    <input name="price" id="filterPrice" type="text" class="span2" value=""
                           data-slider-min="{{$products->min('price')}}" data-slider-max="{{$products->max('price')}}"
                           data-slider-step="5"
                           data-slider-value="[{{$products->min('price')}}, {{$products->max('price')}}]"/>
                </li>
                <li class="mt-4 mb-4 text-type-rules">Purchase Rules</li>
                <li class="mt-4 text-type-title">A popular practice of our time is the sale of young plants
                in special containers growing in the ground.
                Such plants have a closed type of root system ...
                </li>
                <li>
                    <a href="{{route('public.terms-of-sale.index')}}" class="text-href">Read more</a>
                </li>
                </ul>
            </div>

            <div class="col-sm-9 ">
                <div class="row margin-for-products">
                    @foreach($products as $product)
                        <div class="col-xl-4 col-sm-12 position-relative">
                            @include('public.products.product-card', ['product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>



</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            let filterPrice = $("#filterPrice");
            let valuePrice;
            let filterType = $("#paulowniaType");
            let valueType;
            filterType.change(function () {
                valueType = filterType.val();
                changeParam('type', valueType);
            });
            filterPrice.slider();
            filterPrice.on('slideStop',function () {
                valuePrice = filterPrice.val();
                changeParam('price', valuePrice);
                });

            function changeParam(key, value) {
                var url = new URL(document.location.href);
                var query_string = url.search;
                var search_params = new URLSearchParams(query_string);
                search_params.set(key, value);
                url.search = search_params.toString();
                document.location = url.toString();
            }
        });

    </script>
@endpush
