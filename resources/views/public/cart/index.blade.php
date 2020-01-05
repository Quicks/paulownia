@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cart.css') }}">
    @endpush

    <div class="row fon-cart mx-auto">
        <div class="col-12 ">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.cart' ])</div>

        <div class="col-3 text-center">
            <div><img data-src="{{asset('/images/img-cart.png')}}" class="lazyload img-cart "></div>
        </div>
        <div class="col-3">
            <div class="text-cart">Seedling paulownia Elongata</div>
        </div>
        <div class="col-2 text-center">3,15 €</div>
        <div class="col-2 text-center"> 1 </div>
        <div class="col-2 text-center">3,15 €</div>


    </div>

@endsection