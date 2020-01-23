@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/checkout.css') }}">
    @endpush

    <div class="row justify-content-center">
        <ul class="checkout-steps list-group flex-row">
            <li class="active list-group-item mx-2">
                <img src="{{asset('themes/default/assets/images/address.svg')}}">
                <span>{{ __('shop::app.checkout.onepage.information') }}</span>
            </li>

            <li class="list-group-item  mx-2">
                <img src="{{asset('http://127.0.0.1:8000/themes/default/assets/images/shipping.svg')}}">
                <span>{{ __('shop::app.checkout.onepage.shipping') }}</span>
            </li>

            <li class="list-group-item  mx-2">
                <img src="{{asset('http://127.0.0.1:8000/themes/default/assets/images/payment.svg')}}">
                <span>{{ __('shop::app.checkout.onepage.payment') }}</span>
            </li>

            <li class="list-group-item  mx-2">
                <img src="{{asset('http://127.0.0.1:8000/themes/default/assets/images/finish.svg')}}">
                <span>{{ __('shop::app.checkout.onepage.complete') }}</span>
            </li>
        </ul>
    </div>

@endsection