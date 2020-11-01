<div class="col-lg-3 col-sm-6 {{isset($customClasses) ? $customClasses : ''}} pd-10">
  <div class="product round-corners">
    <div class='product-card-top'>
      TOP
    </div>
    <!-- @if(round($product->special_price))
      <span class="pr_flash bg_orange">-${{number_format(100 - ($product->special_price * 100 / $product->price), 2, ',', ' ')}}%</span>
    @endif -->
    <div class='product-card-body'>
      <div class="product_img">
        <a href="{{route('public.products.show', ['id' => $product->id])}}">
          @if(count($product->productImages()->get()))
              <img src="/storage/{{$product->productImages()->first()->getImageVersion('thumb')}}" alt="product_img1"/>
          @else
              <img src="/images/banner-logo.png" alt="product_img1"/>
          @endif
        </a>
        <!-- <div class="product_action_box">
          <ul class="list_none pr_action_btn">
            <li>
              <a data-product-id="{{$product->product_id}}" href="#1" class='{{$wishlist_items->where("product_id", $product->product_id)->exists() ? "wishlisted" : ""}}'>
                <i class="ti-heart"></i>
              </a>
            </li>
            <li>
              <a href="#" class='add-product-to-cart' data-product-id="{{$product->product_id}}" data-quantity="1">
                <i class="ti-shopping-cart"></i>
              </a>

              <a href="#"><i class="ti-shopping-cart"></i></a>
            </li>
            <li><a href="{{route('public.products.show', ['id' => $product->url_key])}}"><i class="ti-eye"></i></a></li>
          </ul>
        </div> -->
      </div>
      <div class="product_info">
        <h6>
          <a href="{{route('public.products.show', ['id' => $product->url_key])}}">
            {{$product->name}}
          </a>
        </h6>
        <div><strong>@lang('checkout.label.size'): </strong><span> {{$product->tree_size}} </span></div>
        <div><strong>@lang('checkout.label.age'): </strong><span> {{$product->Tree_age}} </span></div>
        <div><strong>@lang('checkout.label.container'): </strong><span> {{$product->Tree_container}} </span></div>
      </div>
      <div class='product-footer'>
          <div class='price-block'>
            @if(round($product->special_price))
              <span class="through-price">${{number_format($product->special_price, 2, ',', ' ')}}</span>
              <br>
            @endif
            <span class="price">${{number_format($product->price, 2, ',', ' ')}}</span>
            
          </div>
          <div class='action-block'>
            <span class='action-btn wishlist-btn'>
              <a data-product-id="{{$product->product_id}}" href="#1" class='add-product-to-wishlist {{$wishlist_items->where("product_id", $product->product_id)->exists() ? "wishlisted" : ""}}'>
                @include('icons/heart')
              </a>
            </span>
            <span class='action-btn cart-btn'>
              @if(Webkul\Checkout\Facades\Cart::getCart())
                <a href="#" class='add-product-to-cart' 
                  data-product-id="{{$product->product_id}}" 
                  data-quantity="{{Webkul\Checkout\Facades\Cart::getCart()->items->contains(function($value,   $key) use($product) { return $value->product_id == $product->product_id; } ) ? 1 :$product->min_order_qty}}">
                  @include('icons/bag')
                </a>
              @else
                <a href="#" class='add-product-to-cart'
                  data-product-id="{{$product->product_id}}" 
                  data-quantity="{{$product->min_order_qty}}">
                    @include('icons/bag')
                </a>
              @endif
            </span>
          </div>
          
        </div>
    </div>
  </div>
</div>