@push('css')
    <link rel="stylesheet" href="{{asset('css/filter-goods.css')}}?v15">
    <link rel="stylesheet" href="{{asset('css/ticker.css') }}?v4">
    <link rel="stylesheet" href="{{asset('css/products-price.css') }}?v6">
    <link rel="stylesheet" href="{{ asset('css/selectric.css')}}">
@endpush
<style>
    .selectric {
        color: black;
        min-width: 220px;
        max-width: 220px;
    }
    .selectric .label {
        color: black;
        border-bottom: 1px solid black;
        font-weight: normal;
        font-style: italic;
        letter-spacing: 0.02rem;
        padding-left: 0.7rem;
    }
    .selectric .button {
        color:#8CBD02;
        font-size: 2rem;
        line-height: 1.7rem;
        right: 2%;
        font-weight: normal;
    }
    .selectric-items {
        background: lightgrey;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        margin-top: -40px;
        min-width: 220px;
        max-width: 220px;
    }
    .selectric-items li {
        color: black;
    }
    .selectric-items li.selected{
        color: black;
        background: #8CBD02;
    }
    .selectric-items li:hover{
        color: #8CBD02;
        font-weight: bold;
        background: transparent;
    }
    .selectric-items .selectric-scroll {
        padding-left: 10px;
        padding-bottom: 10px;
        overflow: hidden;
    }

</style>

<div class="row" style="background: white">

    @if(!empty($ticker->text))
        <div class="col-12 ticker-back">
            <marquee class="ticker-text" @if(App::getLocale() == 'ar') direction="right" @endif>
                {!! $ticker->text !!}
            </marquee>
        </div>
    @endif
</div>

<div class="fon-for-goods">
        <div class="row price-background">
            <div class="col-12 mt-5 mb-5">
                <div class="price-img-leaf-position">
                    <img class="price-img-leaf lazyload"
                         data-src="{{asset('/images/service-leaf-tree.png')}}">
                </div>
                <div class="price-text pb-5">
                    @lang('products.price-text')
                    <a href="{{asset('/price_list/price_list.pdf')}}" download>
                        <button class="price-list-button ml-xl-5 ml-md-3">
                            <img data-src="/images/booklet-footer.svg" class="lazyload"> price list</button>
                    </a>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row pb-5">
                <div class="col-xl-3 col-md-3 col-sm-12">
                    <ul class="style-for-list-goods ml-3 sticky-top">
                        <li class="m-0">
                            <hr class="lile-between ml-0 mr-0">
                        </li>
                        <li data-category="all" id="all" class="mt-4 mb-4 text-type filterCategory text-type-active">
                            @lang('products.all-goods')
                        </li>

                        @foreach($categories as $category)
                            <li data-category="{{$category->slug}}" id="{{$category->slug}}"
                                class="mt-4 mb-4 text-type filterCategory">{{$category->name}}</li>
                        @endforeach
                        <li class="m-0">
                            <hr class="lile-between ml-0 mr-0">
                        </li>
                        <li class="mt-2 mb-2 text-type-title">@lang('products.discounts')</li>
                        <li>
                            <select id="paulowniaType" class="select-goods pl-2">
                                <option selected disabled hidden> @lang('products.type-of-paulownia')</option>
                                <option value="all">@lang('products.all-goods')</option>
                                @foreach($types as $type)
                                    <option
                                        @if($selectedTypeId == $type->id)
                                        selected
                                        @endif
                                        value="{{$type->id}}"> {{$type->admin_name}}</option>
                                @endforeach
                            </select>

                        </li>

                        <li class="m-0">
                            <hr class="lile-between ml-0 mr-0">
                        </li>
                        <li class="mt-4 text-type-title">
                            Price {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}</li>
                        <li class="text-type-prise">
                            from {{number_format($minPrice, 2)}}
                            to {{number_format($maxPrice, 2)}}
                        </li>
                        <li class="mb-5">
                            <input name="price" id="filterPrice" type="text" class="span2" value=""
                                   data-slider-min="{{$minPrice}}"
                                   data-slider-max="{{$maxPrice}}"
                                   data-slider-step="5"
                                   data-slider-value="[{{$minPrice}}, {{$maxPrice}}]"/>
                        </li>
                        <li class="m-0">
                            <hr class="lile-between ml-0 mr-0">
                        </li>
                        <li class="mt-1 mb-4 text-type-rules">Purchase Rules</li>
                        <li class="mt-2 text-type-title">A popular practice of our time is the sale of young plants
                            in special containers growing in the ground.
                            Such plants have a closed type of root system ...
                        </li>
                        <li>
                            <a href="{{route('public.terms-of-sale.index')}}" class="text-href">Read more</a>
                        </li>

                            <li class="mt-5">
                                <a href="{{route('public.faq.index')}}" class="text-type-rules FAQ-href">FAQ</a>
                            </li>
                    </ul>
                </div>
                <div class="col-xl-9 col-md-9 col-sm-12">
                    <div class="row margin-for-products mr-1" id="products-data">
                        @include('public.products.productsData')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script src="{{asset('js/jquery.selectric.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            let filterPrice = $("#filterPrice");
            let filterType = $("#paulowniaType");
            let filterCategory = $(".filterCategory");
            let price = {!! $minPrice  !!} + ',' + {!! $maxPrice !!};
            let type = "all";
            let category = "all";

            filterCategory.on('click', function () {
                category = $(this).data('category');
                if($(this).attr("id") == category) {
                    filterCategory.removeClass('text-type-active');
                    $(this). addClass('text-type-active');
                }
                reloadProducts(category, price, type);
            });

            filterType.change(function () {
                type = filterType.val();
                reloadProducts(category, price, type);
            });
            filterPrice.slider();
            filterPrice.on('slideStop', function () {
                price = filterPrice.val();
                reloadProducts(category, price, type);
            });

            function reloadProducts(category, price, type) {
                $.ajax({
                    url: window.location.href,
                    type: "get",
                    data: {'category': category, 'type':type, 'price':price}
                })
                    .done(function (data) {
                        $("#products-data").empty();
                        $("#products-data").append(data.html);
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        alert('server not responding...');
                    });
            }

            $('select').selectric({
                arrowButtonMarkup: '<i class="button fa fa-angle-down" aria-hidden="true"></i>',
                nativeOnMobile: true,
            });
        });

    </script>
@endpush
