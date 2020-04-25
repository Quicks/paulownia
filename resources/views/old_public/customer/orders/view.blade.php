@extends('layouts.public')
@section('content')

    <div class="account-content pb-5">
        @include('public.customer.profile-header', ['activeItem' => 'orders'])

        <div class="pos-profile">
            <div class="mb-3">
                <span class="profile-profile-title">
                    @lang('profile.order-date'): {{ core()->formatDate($order->created_at, 'd.m.Y') }}
                </span>
            </div>
            <div class="mb-3">
                <span class="profile-profile-title">@lang('profile.prod-ordered'):</span>
            </div>
            <div>
                <table class="col-12 mb-3 profile-order-background table" width="100%" cellspacing="0" cellpadding="10">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="profile-profile-title"> @lang('profile.sku')</th>
                        <th class="profile-profile-title"> @lang('profile.product-name')</th>
                        <th class="profile-profile-title"> @lang('profile.price')</th>
                        <th class="profile-profile-title"> @lang('profile.qty')</th>
                        <th class="profile-profile-title"> @lang('profile.subtotal')</th>
                        <th class="profile-profile-title"> @lang('profile.tax-percent')</th>
                        <th class="profile-profile-title"> @lang('profile.tax-amount')</th>
                        <th class="profile-profile-title"> @lang('profile.grand-total')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>
                                <img class="order-img lazyload"
                                     data-src="{{asset('storage/'.$item->product->images[0]->path_tmb)}}">
                            </td>
                            <td>{{ $item->type == 'configurable' ? $item->child->sku : $item->sku }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ core()->formatPrice($item->price, $order->order_currency_code) }}</td>
                            <td>
                                <span>
                                    {{ __('shop::app.customer.account.order.view.item-ordered', ['qty_ordered' => $item->qty_ordered]) }}
                                </span>

                                <span>
                                    {{ $item->qty_invoiced ? __('shop::app.customer.account.order.view.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : '' }}
                                </span>

                                <span>
                                    {{ $item->qty_shipped ? __('shop::app.customer.account.order.view.item-shipped', ['qty_shipped' => $item->qty_shipped]) : '' }}
                                </span>

                                <span>
                                    {{ $item->qty_canceled ? __('shop::app.customer.account.order.view.item-canceled', ['qty_canceled' => $item->qty_canceled]) : '' }}
                                </span>
                            </td>
                            <td>{{ core()->formatPrice($item->total, $order->order_currency_code) }}</td>
                            <td>{{ number_format($item->tax_percent, 2) }}%</td>
                            <td>{{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}</td>
                            <td>{{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.subtotal'):</span>
                <span>{{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}</span>
            </div>
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.ship-hang'):</span>
                <span>{{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}</span>
            </div>
            @if ($order->base_discount_amount > 0)
                <div class="text-right pr-5 pt-3">
                    <span class="profile-profile-title">@lang('profile.discount'):</span>
                    <span>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</span>
                </div>
            @endif
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.tax-amount'):</span>
                <span>{{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}</span>
            </div>
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.grand-total'):</span>
                <span>{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</span>
            </div>
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.total-paid'):</span>
                <span>{{ core()->formatPrice($order->grand_total_invoiced, $order->order_currency_code) }}</span>
            </div>
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.total-refunded'):</span>
                <span>{{ core()->formatPrice($order->grand_total_refunded, $order->order_currency_code) }}</span>
            </div>
            <div class="text-right pr-5 pt-3">
                <span class="profile-profile-title">@lang('profile.total-due'):</span>
                <span>{{ core()->formatPrice($order->total_due, $order->order_currency_code) }}</span>
            </div>
            <hr>

            @if ($order->invoices->count())
                @foreach ($order->invoices as $invoice)
                    <div class="row">
                        <div class="mb-3 col-10">
                            <span class="profile-profile-title">@lang('profile.invoice') #{{$invoice->id}}</span>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('customer.orders.print', $invoice->id) }}" class="product-button">
                                @lang('profile.print')
                            </a>
                        </div>
                        <div class="col-12">
                            <table class="col-12 mb-3 profile-order-background table" width="100%" cellspacing="0"
                                   cellpadding="10">
                                <thead>
                                <tr>
                                    <th class="profile-profile-title"> @lang('profile.sku')</th>
                                    <th class="profile-profile-title"> @lang('profile.product-name')</th>
                                    <th class="profile-profile-title"> @lang('profile.price')</th>
                                    <th class="profile-profile-title"> @lang('profile.qty')</th>
                                    <th class="profile-profile-title"> @lang('profile.subtotal')</th>
                                    <th class="profile-profile-title"> @lang('profile.tax-amount')</th>
                                    <th class="profile-profile-title"> @lang('profile.grand-total')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoice->items as $item)
                                    <tr>
                                        <td>{{ $item->child ? $item->child->sku : $item->sku }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ core()->formatPrice($item->price, $order->order_currency_code) }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ core()->formatPrice($item->total, $order->order_currency_code) }}</td>
                                        <td>{{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}</td>
                                        <td>{{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right pr-5 pt-3">
                        <span class="profile-profile-title">@lang('profile.subtotal'):</span>
                        <span>{{ core()->formatPrice($invoice->sub_total, $order->order_currency_code) }}</span>
                    </div>
                    <div class="text-right pr-5 pt-3">
                        <span class="profile-profile-title">@lang('profile.ship-hang')</span>
                        <span>{{ core()->formatPrice($invoice->shipping_amount, $order->order_currency_code) }}</span>
                    </div>
                    <div class="text-right pr-5 pt-3">
                        <span class="profile-profile-title">@lang('profile.tax-amount')</span>
                        <span>{{ core()->formatPrice($invoice->tax_amount, $order->order_currency_code) }}</span>
                    </div>
                    <div class="text-right pr-5 pt-3">
                        <span class="profile-profile-title">@lang('profile.grand-total')</span>
                        <span>{{ core()->formatPrice($invoice->grand_total, $order->order_currency_code) }}</span>
                    </div>
                    <hr>
                @endforeach
            @endif
            @if ($order->shipments->count())
                @foreach ($order->shipments as $shipment)
                    <div class="mb-3">
                        <span class="profile-profile-title">@lang('profile.order') #{{$order->id}}</span>
                    </div>
                    <div class="mb-3">
                        <span class="profile-profile-title">@lang('profile.carrier_title'): {{$shipment->carrier_title}}</span>
                    </div>
                    <div class="mb-3">
                        <span class="profile-profile-title">@lang('profile.track_number'): {{$shipment->track_number}}</span>
                    </div>
                    <div>
                        <table class="col-12 mb-3 profile-order-background table" width="100%" cellspacing="0"
                               cellpadding="10">
                            <thead>
                            <tr>
                                <th class="profile-profile-title"> @lang('profile.sku')</th>
                                <th class="profile-profile-title"> @lang('profile.product-name')</th>
                                <th class="profile-profile-title"> @lang('profile.qty')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($shipment->items as $item)
                                <tr>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <span class="profile-profile-title">@lang('profile.shipping-address')</span>
                    </div>
                    @include ('admin::sales.address', ['address' => $order->billing_address])
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <span class="profile-profile-title">@lang('profile.billing-address')</span>
                    </div>
                    @include ('admin::sales.address', ['address' => $order->shipping_address])
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <span class="profile-profile-title">@lang('profile.shipping-method'):</span>
                <div>{{ $order->shipping_title }}</div>
            </div>
            <hr>
            <div class="mb-3">
                <span class="profile-profile-title">@lang('profile.payment-method'):</span>
                <div>{{ core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title') }}</div>
            </div>
        </div>
    </div>
@endsection