@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cart.css') }}">
    @endpush

    <div class="row fon-cart mx-auto">
        <div class="col-12 ">@include('public.breadcrumbs', $breadcrumbs = [route('public.cart.index') => 'public-translations.cart' ])</div>

        <div class="col-6"></div>
        <div class="col-2 text-center text-title-cart mt-xl-3"> @lang('public-translations.price-for-1-item'):</div>
        <div class="col-2 text-center text-title-cart mt-xl-3">@lang('public-translations.amount'):</div>
        <div class="col-2 text-center text-title-cart mt-xl-3">@lang('public-translations.total'):</div>

        @foreach ($cart->items as $item) 
            <div class="col-3 text-center mb-4">
                <div>
                    @if(!empty($item->product->images[0]->path_tmb) || !empty($item->product->images[0]->path))
                        <img style="width:170px" data-src="{{asset('/storage/'. ($item->product->images[0]->path_tmb ? $item->product->images[0]->path_tmb : $item->product->images[0]->path))}}"
                             class="lazyload img-cart">
                    @else
                        <img style="width:170px" data-src="{{asset('/images/product-card-placeholder.jpg')}}" class="lazyload img-cart">
                    @endif
                </div>
            </div>
            <div class="col-3 mb-4">
                <div class="text-name-cart pt-xl-5">{{$item->product_flat->name}}</div>
            </div>
            <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">{{number_format($item->price, 2)}} {{$currency}}</div>
            <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">
                <div class="text-center amount-round mr-xl-5 ml-xl-5 ml-md-2 mr-md-2 ml-sm-1 mr-sm-1 pt-2 pb-2 text-prise-cart">
                    {{$item->quantity}}
                </div>
            </div>
            <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">{{number_format($item->total, 2)}} {{$currency}}</div>
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

    </div>

@endsection