@extends('layouts.public')

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

            {!! view_render_event('bagisto.shop.customers.account.orders.list.before', ['orders' => $orders]) !!}

            <div class="account-items-list">
                <div class="account-table-content">
                    @inject('order','Webkul\Shop\DataGrids\OrderDataGrid')
                    {!! $order->render() !!}
                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.orders.list.after', ['orders' => $orders]) !!}

        </div>

    </div>

@endsection