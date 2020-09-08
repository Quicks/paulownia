@foreach($customer->orders as $order)
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
{{--            <span class="value-customers-view">--}}
{{--                {{ core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title') }}--}}
{{--            </span>--}}
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
@endforeach