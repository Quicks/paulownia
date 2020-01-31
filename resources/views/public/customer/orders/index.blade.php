@extends('layouts.public')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/customer-profile.css') }}?v1">
    @endpush

@section('content')

    <div class="account-content">
        @include('public.customer.profile-header', ['activeItem' => 'orders'])

        <div class="account-layout">

            <div class="account-head mb-10">
                <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading">
                    {{ __('shop::app.customer.account.order.index.title') }}
                </span>

                <div class="horizontal-rule"></div>
            </div>

            <div class="account-items-list">
                <div class="account-table-content">
                    @inject('order','Webkul\Shop\DataGrids\OrderDataGrid')
                    {!! $order->render() !!}
                </div>
            </div>

        </div>

    </div>

@endsection