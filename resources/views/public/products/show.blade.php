@extends('layouts.public')

@section('content')
@include('public.blocks.page_header', ['title' => __('products.all-goods')])

<section>
    <div class='custom-page-description'>

    	<div class="row product-info">
            <div class='col-md-7'>
                <div class='shadowed-element'>
                    @if(count($product->product->productImages()->get()))
                        <img id="product_img" src='/storage/{{$product->product->productImages()->first()->image}}' alt="product" data-zoom-image="/images/product1.jpg"/>
                    @else
                        <img src="/images/banner-logo.png" alt="product_img1"/>
                    @endif
                    <div id="pr_item_gallery" class="product_gallery_item owl-thumbs-slider owl-carousel owl-theme">
                        @foreach($product->product->productImages()->get() as $image)
                            <div class="item">
                                <a href="#" class="active" data-image="/storage/{{$image->image}}" data-zoom-image="/storage/{{$image->image}}">
                                    <img src="/storage/{{$image->image}}" alt="product" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class='col-md-5 shadowed-element'>
                <div class="pr_detail">
                    <div class="product-description">
                    <div class="product-title">
                        <h4><a href="#">{{$product->name}}</a></h4>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            Артикул: 
                        </span>
                        <span class='product-info-value'>
                            {{$product->sku}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            Категории: 
                        </span>
                        <span class='product-info-value'>
                            {{$product->product->categories->pluck('name')->implode(', ')}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            Размер: 
                        </span>
                        <span class='product-info-value'>
                            {{$product->tree_size}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            Возраст: 
                        </span>
                        <span class='product-info-value'>
                            {{$product->Tree_age}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            Минимальный заказ: 
                        </span>
                        <span class='product-info-value'>
                            {{$product->min_order_qty}}
                        </span>
                    </div>

                    <div class="product-price text-center">
                        <span class="price">${{number_format($product->price, 2, ',', ' ')}}$/1шт.</span>
                    </div>
                    <div class='product-cart-quantity'>
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                    </div>
                    <div class="product-price text-center">
                        <span class="price">${{number_format($product->price, 2, ',', ' ')}}$/1шт.</span>
                    </div>
                    <div class="cart_extra">
                        <div class="cart_btn">
                            <a class="add_wishlist" data-product-id="{{$product->product_id}}" href="#"><i class="ti-heart"></i></a>
                            <button class="custom-page-tab active btn-addtocart add-product-to-cart"
                                data-product-id="{{$product->product_id}}" 
                                data-quantity='1'
                                type="button">
                                @lang('products.add-cart')
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="heading_s2 m-0">
                    <h3>@lang('products.similar-products')</h3>
                </div>
                <div class="small_divider clearfix"></div>
                <div class='products-data row shop_container'>
                    @foreach($similarProducts as $similarProduct)
                        @include('public.products.product_card', ['product' => $similarProduct, 'customClasses' => 'col-sm-3'])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


