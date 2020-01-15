@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css')}}?v7">
    <link rel="stylesheet" href="{{asset('css/show-product.css') }}?v4">
@endpush
@section('content')

    <div class="show-page-back">

        @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods',
         route('public.products.show', $product->url_key) => $product->name])

        <div class="row">
            <div class="col-6 mt-5">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="slider-nav mt-5" style="position: relative">
                            @foreach($product->images as $img)
                                <div class="mb-xl-5"><img src="{{asset('storage/'.$img->path)}}" class="imgs-nav"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-8 img-main-wrap">
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
            <div class="col-6 mt-5">
                <ul class="style-for-list-show">
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
                        <li>{{$product->reservation}}</li>
                    @endif
                    <li>@lang('products.min-order') {{$product->min_order_qty}} @lang('products.pieces').</li>
                </ul>
                <nav class="ml-5">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link custom-tab active mr-4" id="nav-home-tab" data-toggle="tab"
                           href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">@lang('products.size')</a>
                        <a class="nav-item nav-link custom-tab mr-4" id="nav-profile-tab" data-toggle="tab"
                           href="#nav-profile"
                           role="tab" aria-controls="nav-profile"
                           aria-selected="false">@lang('products.product-information')</a>
                        <a class="nav-item nav-link custom-tab mr-4" id="nav-contact-tab" data-toggle="tab"
                           href="#nav-contact"
                           role="tab" aria-controls="nav-contact"
                           aria-selected="false">@lang('products.characteristic')</a>
                        <a class="nav-item nav-link custom-tab" id="nav-contact-tab-1" data-toggle="tab"
                           href="#nav-contact-1"
                           role="tab" aria-controls="nav-contact-1" aria-selected="false">@lang('products.delivery')</a>
                    </div>
                </nav>
                <div class="tab-content ml-4" id="nav-tabContent">
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
                        {{strip_tags($product->short_description)}}
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        {{strip_tags($product->description)}}
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-contact-1" role="tabpanel"
                         aria-labelledby="nav-contact-tab-1">
                        @if(!empty($product->delivery))
                            {{$product->delivery}}
                        @endif
                    </div>
                </div>
                <div class="mt-5 ml-4">
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
                    <span class="mr-5 total-sum">{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}</span>
                    <form action="{{ route('cart.add', $product->product_id) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="product" value="{{ $product->product_id }}">
                        <input id="qtyAdd" type="hidden" name="quantity" value="1">
                        <button class="product-button"> @lang('products.add-cart') </button>
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
                <button class="product-button"> All goods</button>
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
                arrows: false,
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
                nextArrow: '<i class="fa fa-angle-down downArrow fa-2x" aria-hidden="true"></i>',
                prevArrow: '<i class="fa fa-angle-up upArrow fa-2x" aria-hidden="true"></i>',
                asNavFor: '.slider-for',
                dots: false,
                centerMode: false,
                focusOnSelect: false,
                mobileFirst:true
            });
        });

    </script>
@endpush