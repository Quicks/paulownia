@if(Webkul\Checkout\Facades\Cart::getCart())
  <ul class="cart_list gray-background">
    @foreach(Webkul\Checkout\Facades\Cart::getCart()->items as $item)
      <li class='product-row round-corners row white-background'>
        <div class='product-image col-2'>
          <img class='round-corners' :src="getProductImage(item.product)"/>
        </div>
        <div class='product-info col-5'>
          <div class='product-title'>
            {{$item->name}}
          </div>

          <div class='product-sku'>@lang('checkout.label.sku'): 
            <span> {{$item->sku}} </span>
          </div>
          <div class='product-size green-color checkout-label'>@lang('checkout.label.size'): 
            <span class='black-color'> {{$item->product->tree_size}} </span>
          </div>
          <div class='product-age green-color checkout-label'>@lang('checkout.label.age'): 
            <span class='black-color'> {{$item->product->tree_age}} </span>
          </div>
        </div>
        <div class='product-quantity content-centered col-2 text-center' data-title="Quantity" data-cart-item-id="{{$item->id}}" data-cart-min-qty='{{$item->product->min_order_qty}}'>
          <div class="quantity">
            <input type="button" value="-" class="minus">
            <input type="text" name="quantity" value="{{$item->quantity}}" title="Qty" class="qty" size="4">
            <input type="button" value="+" class="plus">
          </div>
          <!-- {{$item->quantity}} -->
        </div>

        <div class='product-total content-centered col-2 text-center'>
          @money($item->total)
        </div>
        <a href="#" data-product-id="{{$item->id}}" class="item_remove"><i class="ion-close"></i></a>
      <!-- <li>
        <a href="#" data-product-id="{{$item->id}}" class="item_remove"><i class="ion-close"></i></a>
        <a href="#"><img src="/images/cart_thamb1.jpg" alt="cart_thumb1">{{$item->name}}</a>
        <span class="cart_quantity"> {{$item->quantity}} x <span class="cart_amount"> <span class="price_symbole">@money($item->base_total)</span>
      </li> -->
      </li>
    @endforeach
  </ul>
  <div class="cart_footer gray-background">
    <p class="cart_total green-color">
      @lang('cart.label.total'): 
      <span class="cart_amount">
        @money(Webkul\Checkout\Facades\Cart::getCart()->base_grand_total)
      </span>
    </p>
    <p class="cart_buttons">
      <a href="{{route('public.cart.index')}}" class="custom-page-tab view-cart">@lang('cart.label.view_cart')</a>
      <a href="{{route('check-out.index')}}" class="custom-page-tab active checkout">@lang('cart.label.checkout')</a>
    </p>
  </div>
@else
  <ul class="cart_list gray-background">
    <li>
      @lang('cart.label.empty_cart', ['link' => route('public.products.index'), 'title' => trans('products.title')])
    </li>
  </ul>
@endif