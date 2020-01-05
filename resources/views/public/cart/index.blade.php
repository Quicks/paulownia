@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cart.css') }}">
    @endpush

    <div class="row fon-cart mx-auto">
        <div class="col-12 ">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.cart' ])</div>

        <div class="col-6"></div>
        <div class="col-2 text-center text-title-cart mt-xl-3">Price for 1 item:</div>
        <div class="col-2 text-center text-title-cart mt-xl-3">Amount:</div>
        <div class="col-2 text-center text-title-cart mt-xl-3">Total:</div>


        <div class="col-3 text-center">
            <div><img data-src="{{asset('/images/img-cart.png')}}" class="lazyload img-cart "></div>
        </div>
        <div class="col-3">
            <div class="text-name-cart pt-xl-5">Seedling paulownia Elongata</div>
        </div>
        <div class="col-2 text-center pt-xl-5">3,15 €</div>
        <div class="col-2 text-center pt-xl-5"> 1 </div>
        <div class="col-2 text-center pt-xl-5">3,15 €</div>




    </div>

@endsection