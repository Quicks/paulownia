@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cart.css') }}">
    @endpush

    <div class="row fon-cart mx-auto">
        <div class="col-12 ">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'about-us-header.cart' ])</div>

        <div class="col-6"></div>
        <div class="col-2 text-center text-title-cart mt-xl-3"> @lang('about-us-header.price-for-1-item'):</div>
        <div class="col-2 text-center text-title-cart mt-xl-3">@lang('about-us-header.amount'):</div>
        <div class="col-2 text-center text-title-cart mt-xl-3">@lang('about-us-header.total'):</div>


        <div class="col-3 text-center mb-4">
            <div><img data-src="{{asset('/images/img-cart.png')}}" class="lazyload img-cart"></div>
        </div>
        <div class="col-3 mb-4">
            <div class="text-name-cart pt-xl-5">Seedling paulownia Elongata</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">
            <div class="text-center amount-round mr-xl-5 ml-xl-5 ml-md-2 mr-md-2 ml-sm-1 mr-sm-1 pt-2 pb-2 text-prise-cart">1</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>



        <div class="col-3 text-center mb-4">
            <div><img data-src="{{asset('/images/img-cart.png')}}" class="lazyload img-cart"></div>
        </div>
        <div class="col-3 mb-4">
            <div class="text-name-cart pt-xl-5">Seedling paulownia Elongata</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">
            <div class="text-center amount-round mr-xl-5 ml-xl-5 ml-md-2 mr-md-2 ml-sm-1 mr-sm-1 pt-2 pb-2 text-prise-cart">1</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>


        <div class="col-3 text-center mb-4">
            <div><img data-src="{{asset('/images/img-cart.png')}}" class="lazyload img-cart"></div>
        </div>
        <div class="col-3 mb-4">
            <div class="text-name-cart pt-xl-5">Seedling paulownia Elongata</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">
            <div class="text-center amount-round mr-xl-5 ml-xl-5 ml-md-2 mr-md-2 ml-sm-1 mr-sm-1 pt-2 pb-2 text-prise-cart">1</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>



        <div class="col-3 text-center mb-4">
            <div><img data-src="{{asset('/images/img-cart.png')}}" class="lazyload img-cart"></div>
        </div>
        <div class="col-3 mb-4">
            <div class="text-name-cart pt-xl-5">Seedling paulownia Elongata</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">
            <div class="text-center amount-round mr-xl-5 ml-xl-5 ml-md-2 mr-md-2 ml-sm-1 mr-sm-1 pt-2 pb-2 text-prise-cart">1</div>
        </div>
        <div class="col-2 text-center pt-xl-5 mb-4 text-prise-cart">3,15 €</div>

        <div class="col-12">
            <hr width="90%"/>
        </div>


        <div class="col-12 text-right mt-3 text-right-pad"> VAT: 10% </div>
        <div class="col-12 text-right text-right-pad"> @lang('about-us-header.total-excluding') VAT: 12,60 €</div>
        <div class="col-12 text-right font-weight-bold mt-3 text-right-pad text-prise-all "> @lang('about-us-header.total'):13,86 € </div>

        <div class="col-12 text-right-pad text-right mt-5 ">
            <button type="submit" class="button-contacts mt-3 mb-5">
                @lang('about-us-header.make-an-order')
            </button>
        </div>

    </div>

@endsection