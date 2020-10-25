<div class="col-lg-3 col-sm-6 {{isset($customClasses) ? $customClasses : ''}} pd-10">
  <div class="product">
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
        <!-- <div class="rating"><div class="product_rate" style="width:80%"></div></div> -->
        <div><strong>Размер: </strong><span> 1 метр </span></div>
        <div><strong>Возраст: </strong><span> 3 года </span></div>
        <div><strong>Контейнер: </strong><span> 5 литров </span></div>
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
              <a data-product-id="{{$product->product_id}}" href="#1" class='{{$wishlist_items->where("product_id", $product->product_id)->exists() ? "wishlisted" : ""}}'>
                @include('icons/heart')
                <!-- <img src="/images/heart.svg" alt="add to cart"/> -->
              </a>
            </span>
            <span class='action-btn cart-btn'>
              <a href="#" class='add-product-to-cart' data-product-id="{{$product->product_id}}" data-quantity="1">
                <!-- <img src="/images/bag.svg" alt="add to cart"/> -->
                @include('icons/bag')
              </a>
            </span>
          </div>
          
        </div>
    </div>
  </div>
</div>