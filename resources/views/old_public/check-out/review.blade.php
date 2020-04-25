<div class="form-container">
    <div class="form-header justify-content-center ">
        <span class="checkout-step-heading text-shadow-address">{{ __('shop::app.checkout.onepage.summary') }}</span>
    </div>

    <div class="address-summary justify-content-center  ">
        @if ($billingAddress = $cart->billing_address)
            <div class="billing-address mb-5">
                <div class="card-title mb-2">
                    <b class="text-form-address">{{ __('shop::app.checkout.onepage.billing-address') }}</b>
                </div>

                <div class="card-content">
                    <ul class="p-0">
                        <li class="mb-3">
                            {{ $billingAddress->name }}
                        </li>
                        <li class="mb-3">
                            {{ $billingAddress->address1 }},<br/> {{ $billingAddress->state }}
                        </li>
                        <li class="mb-3">
                            {{ core()->country_name($billingAddress->country) }} {{ $billingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-1 mt-1"></span>

                        <li class="mb-1">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $billingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if ($shippingAddress = $cart->shipping_address)
            <div class="shipping-address mb-5">
                <div class="card-title mb-2">
                    <b>{{ __('shop::app.checkout.onepage.shipping-address') }}</b>
                </div>

                <div class="card-content">
                    <ul class="p-0">
                        <li class="mb-3">
                            {{ $shippingAddress->name }}
                        </li>
                        <li class="mb-3">
                            {{ $shippingAddress->address1 }},<br/> {{ $shippingAddress->state }}
                        </li>
                        <li class="mb-3">
                            {{ core()->country_name($shippingAddress->country) }} {{ $shippingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-1 mt-1"></span>

                        <li class="mb-1">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $shippingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div>

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <div class="cart-item-list mt-4 cart-item-list-margin">
        @foreach ($cart->items as $item)

            <?php $product = $item->product; ?>

            <div class="item mb-5" style="margin-bottom: 5px;">
                <div class="item-image">
                    @if(!empty($item->product->images[0]->path_tmb) || !empty($item->product->images[0]->path))
                        <img style="width:170px" data-src="{{asset('/storage/'. ($item->product->images[0]->path_tmb ? $item->product->images[0]->path_tmb : $item->product->images[0]->path))}}"
                             class="lazyload img-cart">
                    @else
                        <img style="width:170px" data-src="{{asset('/images/product-card-placeholder.jpg')}}" class="lazyload img-cart">
                    @endif
                </div>

                <div class="item-details">

                    {!! view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]) !!}

                    <div class="item-title">
                        {{ $product->name }}
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.price') }}
                        </span>
                        <span class="value">
                            {{ core()->currency($item->base_price) }}
                        </span>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.quantity') }}
                        </span>
                        <span class="value">
                            {{ $item->quantity }}
                        </span>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]) !!}

                    @if ($product->type == 'configurable')
                        {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}

                        <div class="summary" >
                            {{ Cart::getProductAttributeOptionDetails($item->child->product)['html'] }}
                        </div>

                        {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="order-description mt-2 mb-3">


        <div class="pull-left pull-left-end mt-2">
            <slot name="summary-section"></slot>
        </div>


        <div class="pull-right pull-right-end">
            <div class="shipping">
                <div class="decorator">
                    <i class="icon shipping-icon"></i>
                </div>

                <div class="text">
                    {{ core()->currency($cart->selected_shipping_rate->base_price) }}

                    <div class="info">
                        {{ $cart->selected_shipping_rate->method_title }}
                    </div>
                </div>
            </div>

            <div class="payment">
                <div class="decorator">
                    <i class="icon payment-icon"></i>
                </div>

                <div class="text">
                    {{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}
                </div>
            </div>

        </div>



    </div>
</div>