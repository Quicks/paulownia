@extends('admin::layouts.content')

@section('page_title')
    Customer {{$customer->id}}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link"
                       onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';">
                    </i>
                    Customer #{{$customer->id}}
                </h1>
            </div>
        </div>
        <div class="page-content">
            <div class="section-content-customers">
                <div class="row">
                    <span class="title-customers-view">
                        Id
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->id }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                        First name
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->first_name }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                        Last name
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->last_name }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                        Gender
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->gender }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                        Date of birth
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->date_of_birth }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                       Email
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->email }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                        Phone
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->phone }}
                    </span>
                </div>
                <div class="row">
                    <span class="title-customers-view">
                        Notes
                    </span>

                    <span class="value-customers-view">
                       {{ $customer->notes }}
                    </span>
                </div>
            </div>
            @foreach($orders as $order)
                <div class="section-content-customers">
                    <div class="secton-title-customers">
                        <span>Order {{$order->id}}</span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.order-date') }}
                        </span>
                        <span class="value-customers-view">
                            {{ $order->created_at }}
                        </span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.order-status') }}
                        </span>
                        <span class="value-customers-view">
                            {{ $order->status }}
                        </span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.payment-method') }}
                        </span>
                        <span class="value-customers-view">
                            {{ core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title') }}
                        </span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view">
                           {{ __('admin::app.sales.orders.currency') }}
                        </span>
                        <span class="value-customers-view">
                            {{ $order->order_currency_code }}
                        </span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.shipping-method') }}
                        </span>
                        <span class="value-customers-view">
                            {{ $order->shipping_title }}
                        </span>
                    </div>
                </div>
                <div class="section-content-customers">
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.shipping-handling') }}
                        </span>
                        <span class="value-customers-view">
                           {{ core()->formatBasePrice($order->base_shipping_amount) }}
                        </span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.subtotal') }}
                        </span>
                        <span class="value-customers-view">
                           {{ core()->formatBasePrice($order->base_sub_total) }}
                        </span>
                    </div>
                    @if ($order->base_discount_amount > 0)
                        <div class="row">
                            <span class="title-customers-view">
                                {{ __('admin::app.sales.orders.discount') }}
                            </span>
                            <span class="value-customers-view">
                                {{ core()->formatBasePrice($order->base_discount_amount) }}
                            </span>
                        </div>
                    @endif
                    <div class="row">
                        <span class="title-customers-view">
                            {{ __('admin::app.sales.orders.tax') }}
                        </span>
                        <span class="value-customers-view">
                            {{ core()->formatBasePrice($order->base_tax_amount) }}
                        </span>
                    </div>
                    <div class="row">
                        <span class="title-customers-view" style="font-weight:bold ">
                            Grand Total
                        </span>
                        <span class="value-customers-view" style="font-weight:bold ">
                           {{ core()->formatBasePrice($order->base_grand_total) }}
                        </span>
                    </div>
                </div>
                <div class="table">
                    <table>
                        <thead>
                        <tr>
                            <th>{{ __('admin::app.sales.orders.SKU') }}</th>
                            <th>{{ __('admin::app.sales.orders.product-name') }}</th>
                            <th>{{ __('admin::app.sales.orders.price') }}</th>
                            <th>{{ __('admin::app.sales.orders.subtotal') }}</th>
                            <th>{{ __('admin::app.sales.orders.tax-percent') }}</th>
                            <th>{{ __('admin::app.sales.orders.tax-amount') }}</th>
                            @if ($order->base_discount_amount > 0)
                                <th>{{ __('admin::app.sales.orders.discount-amount') }}</th>
                            @endif
                            <th>{{ __('admin::app.sales.orders.grand-total') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{$item->sku }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ core()->formatBasePrice($item->base_price) }}</td>
                                <td>{{ core()->formatBasePrice($item->base_total) }}</td>
                                <td>{{ $item->tax_percent }}%</td>
                                <td>{{ core()->formatBasePrice($item->base_tax_amount) }}</td>
                                @if ($order->base_discount_amount > 0)
                                    <td>{{ core()->formatBasePrice($item->base_discount_amount) }}</td>
                                @endif
                                <td>{{ core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@stop