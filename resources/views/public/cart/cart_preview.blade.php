@if(Webkul\Checkout\Facades\Cart::getCart())
  <ul class="cart_list">
    @foreach(Webkul\Checkout\Facades\Cart::getCart()->items as $item)
      <li>
        <a href="#" data-product-id="{{$item->id}}" class="item_remove"><i class="ion-close"></i></a>
        <a href="#"><img src="/images/cart_thamb1.jpg" alt="cart_thumb1">{{$item->name}}</a>
        <span class="cart_quantity"> {{$item->quantity}} x <span class="cart_amount"> <span class="price_symbole">@money($item->base_total)</span>
      </li>
    @endforeach
  </ul>
  <div class="cart_footer">
    <p class="cart_total">
      @lang('cart.label.total'): 
      <span class="cart_amount">
        @money(Webkul\Checkout\Facades\Cart::getCart()->base_grand_total)
      </span>
    </p>
    <p class="cart_buttons">
      <a href="{{route('public.cart.index')}}" class="btn btn-default btn-radius view-cart">@lang('cart.label.view_cart')</a>
      <a href="{{route('check-out.index')}}" class="btn btn-dark btn-radius checkout">@lang('cart.label.checkout')</a>
    </p>
  </div>
@else
  <ul class="cart_list">
    <li>
      @lang('cart.label.empty_cart', ['link' => route('public.products.index'), 'title' => trans('products.title')])
    </li>
  </ul>
@endif