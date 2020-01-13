@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cart.css')}}?v2">
    @endpush

    <div class="fon-cart mx-auto">
        @include('public.breadcrumbs', $breadcrumbs = [route('public.cart.index') => 'public-translations.cart' ])

        <div class="row">
            <div class="col-6"></div>
            <div class="col-2 text-center text-title-cart mt-xl-3"> @lang('public-translations.price-for-1-item'):</div>
            <div class="col-2 text-center text-title-cart mt-xl-3">@lang('public-translations.amount'):</div>
            <div class="col-2 text-center text-title-cart mt-xl-3">@lang('public-translations.total'):</div>
        </div>

        @if(!empty($cart))
            @foreach ($cart->items as $item) 
            <div class="row align-items-center py-3">
                <div class="col-3 text-center">
                    @if(!empty($item->product->images[0]->path_tmb) || !empty($item->product->images[0]->path))
                        <img style="width:170px" data-src="{{asset('/storage/'. ($item->product->images[0]->path_tmb ? $item->product->images[0]->path_tmb : $item->product->images[0]->path))}}"
                             class="lazyload img-cart">
                    @else
                        <img style="width:170px" data-src="{{asset('/images/product-card-placeholder.jpg')}}" class="lazyload img-cart">
                    @endif
                </div>
                <div class="col-3">
                    <div class="text-name-cart">{{$item->product_flat->name}}</div>
                </div>
                <div class="col-2 text-center text-prise-cart">{{number_format($item->price, 2)}} {{$currency}}</div>
                <div class="col-2 text-center text-prise-cart">
                    <div class="text-center amount-round pt-2 pb-2 text-prise-cart d-inline-block">
                        {{$item->quantity}}
                    </div >
                    <div class="d-inline-block">
                        <form action="{{ route('cart.add', $item->product_id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product" value="{{ $item->product_id }}">
                            <input id="qtyAdd" type="hidden" name="quantity" value="1">
                            <button class="quantity-arrow quantity-arrow-plus">
                                <img data-src="{{asset("/images/down-arrow-products.png")}}" class="img-rev lazyload">
                            </button>
                        </form>
                        <form action="{{ route('cart.add', $item->product_id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product" value="{{ $item->product_id }}">
                            <input id="qtyAdd" type="hidden" name="quantity" value="-1">
                            <button class="quantity-arrow quantity-arrow-minus">
                                <img data-src="{{asset("/images/down-arrow-products.png")}}" class="lazyload">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-2 text-center text-prise-cart">{{number_format($item->total, 2)}} {{$currency}}</div>
            </div>
            @endforeach

            <div class="col-12">
                <hr width="90%"/>
            </div>


            <div class="col-12 text-right mt-3 text-right-pad"> VAT: {{number_format($cart->tax_total, 2)}} {{$currency}}</div>
            <div class="col-12 text-right text-right-pad"> 
                @lang('public-translations.total-excluding') VAT: {{number_format($cart->sub_total, 2)}} {{$currency}}
            </div>
            <div class="col-12 text-right font-weight-bold mt-3 text-right-pad text-prise-all ">
                @lang('public-translations.total'): {{number_format($cart->grand_total, 2)}} {{$currency}}
            </div>

            <div class="col-12 text-right-pad text-right mt-5 ">
                <button type="submit" class="button-contacts mt-3 mb-5">
                    @lang('public-translations.make-an-order')
                </button>
            </div>
        @endif
    </div>

@endsection