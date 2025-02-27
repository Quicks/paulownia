@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css')}}?v7">
    <link rel="stylesheet" href="{{asset('css/show-product.css') }}?v10">
@endpush
@section('content')

    <div class="show-page-back">
        <div class="row line-for-goods">
            <div class="col-12 mb-5">
                @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods',route('public.products.show', $product->url_key) => $product->name])
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 pl-xl-5 pl-md-0">
                <div class="row">
                    <div class="col-xl-3 img-main-wrap pl-xl-4">
                        <div class="slider-nav mt-5 pt-2" style="position: relative">
                            @foreach($product->images as $img)
                                <div class="mb-xl-5"><img src="{{asset('storage/'.$img->path)}}" class="imgs-nav"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-12 col-sm-12 ml-md-4 ml-sm-2 ml-xl-0">
                        <div class="slider-for">
                            @foreach($product->images as $img)
                                <div>
                                    <img src="{{asset('storage/'.$img->path)}}" class="img-main">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12 padding-right-text-container mt-xl-4 mt-md-0 mt-sm-4">
                <ul class="style-for-list-show p-0">
                    <li class="text-title-for-show mt-3 mb-3">{{$product->name}}</li>
                    <li class="text-title-for-show mb-3">
                        @if($product->special_price != 0)
                            {{number_format($product->special_price, 2)}} {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                        @else
                            {{number_format($product->price, 2)}} {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                        @endif
                    </li>
                    <input id="productPrice" hidden
                           @if($product->special_price != 0) value="{{number_format($product->special_price, 2)}}"
                           @else value="{{number_format($product->price, 2)}}" @endif>
                    <li class="text-under-prise-show mb-3">@lang('products.without-VAT')</li>
                    <li class="text-red-show mb-4">Over 200 pieces discount: -5%</li>
                    @if(!empty($product->reservation))
                        <li>{!! $product->reservation !!}</li>
                    @endif
                    <li>@lang('products.min-order') {{$product->min_order_qty}} @lang('products.pieces').</li>
                </ul>
                <div>
                    <div class="nav nav-tabs mt-xl-5 mt-md-3 mt-sm-3" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link custom-tab active p-0 mr-xl-5 mr-md-3 " id="nav-home-tab" data-toggle="tab"
                           href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">@lang('products.size')</a>
                        <a class="nav-item nav-link custom-tab nav-tabs-425 p-0 ml-xl-4 ml-md-3  mr-xl-5 mr-md-3 " id="nav-profile-tab" data-toggle="tab"
                           href="#nav-profile"
                           role="tab" aria-controls="nav-profile"
                           aria-selected="false">@lang('products.product-information')</a>
                        <a class="nav-item nav-link custom-tab p-0 ml-xl-4 ml-md-3 nav-tabs-425  mr-xl-5 mr-md-4 " id="nav-contact-tab" data-toggle="tab"
                           href="#nav-contact"
                           role="tab" aria-controls="nav-contact"
                           aria-selected="false">@lang('products.characteristic')</a>
                        <a class="nav-item nav-link custom-tab p-0 ml-xl-5 ml-md-3 nav-tabs-425  mr-0" id="nav-contact-tab-1" data-toggle="tab"
                           href="#nav-contact-1"
                           role="tab" aria-controls="nav-contact-1" aria-selected="false">@lang('products.delivery')</a>
                    </div>
                </div>
                <div class="tab-content tab-content-425" id="nav-tabContent">
                    <div class="tab-pane fade show active mt-4" id="nav-home" role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <ul class="style-for-list-show mt-5">
                            @if(!empty($product->height_tree))
                                <li class="size-list">@lang('products.height'): {{$product->height_tree}}</li>
                            @endif
                            <li class="size-list">@lang('products.volume'): {{$product->volume_box}} </li>
                            <li class="size-list">@lang('products.cartridge') {{$product->delivery_unit_qty}} @lang('products.units')</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! $product->short_description !!}
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-contact-1" role="tabpanel"
                         aria-labelledby="nav-contact-tab-1">
                        @if(!empty($product->delivery))
                            {!! $product->delivery !!}
                        @endif
                    </div>
                </div>
                <div class="mt-5 tab-content-425">
                    <label class="amount">@lang('products.amount'):</label>
                    <input class="amount-qty position-relative" type="number" min="1" step="1" value="1">
                    <button class="quantity-arrow quantity-arrow-plus">
                        <img data-src="{{asset("/images/down-arrow-products.png")}}" class="img-rev lazyload">
                    </button>
                    <button class="quantity-arrow quantity-arrow-minus">
                        <img data-src="{{asset("/images/down-arrow-products.png")}}" class="lazyload">
                    </button>
                    <span class="ml-5 amount">@lang('products.total'):</span>
                    <span id="totalSum" class="total-sum">
                        @if($product->special_price != 0)
                            {{number_format($product->special_price, 2)}}
                        @else {{number_format($product->price, 2)}} @endif
                    </span>
                    <span class="mr-xl-5 mr-md-3 mr-sm-2 total-sum">{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}</span>
                    <form action="{{ route('cart.add', $product->product_id) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="product" value="{{ $product->product_id }}">
                        <input id="qtyAdd" type="hidden" name="quantity" value="1">
                        <button class="product-button ml-xl-5 ml-md-0 text-center margin-button-425"> @lang('products.add-cart') </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="title-for-cards-show-product text-center mb-3">@lang('products.similar-products')</div>
        <div class="row mt-2">
            @foreach($similarProducts as $similarProduct)
                @if($product->id == $similarProduct->id) @continue @endif
                <div class="col-xl-3 col-sm-12 position-relative">
                    @include('public.products.product-card', ['product' => $similarProduct])
                </div>
            @endforeach
        </div>
        <div class="text-center pb-5">
            <a href="{{route('public.products.index')}}">
                <button class="product-button">@lang('products.all-goods')</button>
            </a>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
        $(document).ready(function () {
            let amount = $('.amount-qty');
            let buttonUp = $('.quantity-arrow-plus');
            let buttonDown = $('.quantity-arrow-minus');
            let amountMinVal = 1;
            let sum = $('#totalSum');
            let newVal;
            let productPrice = $('#productPrice').val();
            let totalSum;
            let qtyToCard = $('#qtyAdd');

            buttonUp.on("click", function () {
                let oldValue = parseFloat(amount.val());
                newVal = oldValue + 1;
                amount.val(newVal).trigger("change");
            });

            buttonDown.on("click", function () {
                let oldValue = parseFloat(amount.val());
                if (oldValue <= amountMinVal) {
                    newVal = oldValue;
                } else {
                    newVal = oldValue - 1;
                }
                amount.val(newVal).trigger("change");
            });

            amount.val('1').on("change", function () {
                qtyToCard.val(amount.val());
                totalSum = amount.val() * productPrice;
                sum.text(totalSum.toFixed(2));
            });

            //    slider

            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: '<i class="fa fa-angle-down downArrowHorisontal fa-2x" aria-hidden="true"></i>',
                prevArrow: '<i class="fa fa-angle-up upArrowHorisontal fa-2x" aria-hidden="true"></i>',
                // fade: true,
                asNavFor: '.slider-nav',
                mobileFirst: true
            });
            $('.slider-nav').slick({
                vertical: true,
                verticalSwiping:true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: '<i class="fa fa-angle-down downArrowVertical fa-2x" aria-hidden="true"></i>',
                prevArrow: '<i class="fa fa-angle-up upArrowVertical fa-2x" aria-hidden="true"></i>',
                asNavFor: '.slider-for',
                dots: false,
                centerMode: false,
                focusOnSelect: false,
                mobileFirst:true
            });
        });

    </script>
@endpush