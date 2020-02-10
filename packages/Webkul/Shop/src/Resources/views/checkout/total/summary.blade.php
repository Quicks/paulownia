<div class="order-summary">
    <h3>{{ __('shop::app.checkout.total.order-summary') }}</h3>

    <div class="item-detail">
        <label>
            {{ intval($cart->items_qty) }}
            {{ __('shop::app.checkout.total.sub-total') }}
            {{ __('shop::app.checkout.total.price') }}
        </label>
        <label class="right">{{ core()->currency($cart->base_sub_total) }}</label>
    </div>

    @if ($cart->selected_shipping_rate)
        <div class="item-detail">
            <label>{{ __('shop::app.checkout.total.delivery-charges') }}</label>
            <label class="right">{{ core()->currency($cart->selected_shipping_rate->base_price) }}</label>
        </div>
    @endif

    @if ($cart->base_tax_total)
        <div class="item-detail">
            <label>{{ __('shop::app.checkout.total.tax') }}</label>
            <label class="right">{{ core()->currency($cart->base_tax_total) }}</label>
        </div>
    @endif


    <div class="item-detail" id="discount-detail" @if ($cart->discount_amount && $cart->discount_amount > 0) style="display: block;" @else style="display: none;" @endif>
        <label>
            <b>{{ __('shop::app.checkout.total.disc-amount') }}</b>
        </label>
        <label class="right">
            <b id="discount-detail-discount-amount">
                {{ core()->currency($cart->discount_amount) }}
            </b>
        </label>
    </div>

</div>