<div class="account-content">
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <div class="account-layout">

        {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}

        <div class="account-items-list row">
            @if ($items->count())
                @foreach ($items as $item)
                    @include('public.products.product_card', ['product' => $item->product, 'customClasses' => 'col-xl-3'])
                @endforeach

            @else
                <div class="empty">
                    {{ __('customer::app.wishlist.empty') }}
                </div>
            @endif
        </div>

        {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]) !!}

    </div>
</div>
