<div class="col-lg-4 col-sm-6 {{isset($customClasses) ? $customClasses : ''}}">
  <div class="product">
    @if(round($product->special_price))
      <span class="pr_flash bg_orange">-${{number_format(100 - ($product->special_price * 100 / $product->price), 2, ',', ' ')}}%</span>
    @endif
    <div class="product_img">
      <a href="{{route('public.products.show', ['id' => $product->id])}}">
        @if(count($product->productImages()->get()))
            <img src="/storage/{{$product->productImages()->first()->getImageVersion('thumb')}}" alt="product_img1"/>
        @else
            <img src="/images/banner-logo.png" alt="product_img1"/>
        @endif
      </a>
      <div class="product_action_box">
        <ul class="list_none pr_action_btn">
          <li><a href="#"><i class="ti-heart"></i></a></li>
          <li>
            <a href="#" class='add-product-to-cart' data-product-id="{{$product->product_id}}" data-quantity="1">
              <i class="ti-shopping-cart"></i>
            </a>

            <!-- <a href="#"><i class="ti-shopping-cart"></i></a> -->
          </li>
          <li><a href="{{route('public.products.show', ['id' => $product->url_key])}}"><i class="ti-eye"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="product_info">
      <h6>
        <a href="{{route('public.products.show', ['id' => $product->url_key])}}">
          {{$product->name}}
        </a>
      </h6>
      <div class="rating"><div class="product_rate" style="width:80%"></div></div>
      <span class="price">${{number_format($product->price, 2, ',', ' ')}}</span>
      <div class="pr_desc">
        <p>
          {{$product->short_description}}
        </p>
      </div>
      <div class="product_action_box">
        <ul class="list_none pr_action_btn">
          <li>
            <a href="#" class='add-product-to-cart' data-product-id="{{$product->product_id}}" data-quantity="1">
              <i class="ti-shopping-cart"></i>
            </a>
          </li>
            <li><a href="#"><i class="ti-heart"></i></a></li>
            <li><a href="{{route('public.products.show', ['id' => $product->url_key])}}"><i class="ti-eye"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>