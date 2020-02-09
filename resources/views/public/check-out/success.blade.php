@extends('layouts.public')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@section('content')
    <div class="order-success-content row " style="min-height: 230px;">

        <div class="col-xl-2 col-md-12 col-sm-12"> </div>

        <div class="col-xl-8 col-md-12 col-sm-12 ml-xl-4 pl-5 ">
            <h1>{{ __('shop::app.checkout.success.thanks') }}</h1>
            <p>{{ __('shop::app.checkout.success.order-id-info', ['order_id' => $order->id]) }}</p>
            <p>{{ __('shop::app.checkout.success.info') }}</p>
            <a href="{{ route('main') }}" class="product-button-success" style="text-decoration:none;"> {{ __('shop::app.checkout.cart.continue-shopping') }}</a>
        </div>

        <div class="col-xl-2 col-md-12 col-sm-12 "></div>


    </div>
@endsection