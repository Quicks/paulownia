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
                            @lang('checkout.label.sku')
                        </span>
                        <span class='product-info-value'>
                            {{$product->sku}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            @lang('products.categories')
                        </span>
                        <span class='product-info-value'>
                            {{$product->product->categories->pluck('name')->implode(', ')}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            @lang('products.tree_size') 
                        </span>
                        <span class='product-info-value'>
                            {{$product->tree_size}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            @lang('products.tree_age')
                        </span>
                        <span class='product-info-value'>
                            {{$product->Tree_age}}
                        </span>
                    </div>
                    <div>
                        <span class='product-info-label'>
                            @lang('products.min_order_qty')
                        </span>
                        <span class='product-info-value'>
                            {{$product->min_order_qty}}
                        </span>
                    </div>

                    <div class="product-price text-center">
                        <span class="price">${{number_format($product->price, 2, ',', ' ')}}$/@lang('checkout.label.pcs').</span>
                    </div>
                    <div class='product-cart-quantity' data-product-id="{{$product->product_id}}">
                        <input type="button" value="-" class="product-minus">
                        <input type="number" name="quantity" value="{{$product->min_order_qty}}" title="Qty" class="qty" size="4" min='{{$product->min_order_qty}}' step=1>
                        <input type="button" value="+" class="product-plus">
                    </div>
                    <div class="product-price text-center">
                        <span class="price">${{number_format($product->price, 2, ',', ' ')}}$/1шт.</span>
                    </div>
                    <div class="cart_extra">
                        <div class="cart_btn">
                            <a class="add_wishlist" data-product-id="{{$product->product_id}}" href="#"><i class="ti-heart"></i></a>
                            <button class="custom-page-tab active btn-addtocart add-product-to-cart"
                                data-product-id="{{$product->product_id}}" 
                                data-quantity='{{$product->min_order_qty}}'
                                type="button">
                                @lang('products.add-cart')
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='additional-info'>
        <div class="tab-style1 col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">@lang('products.description')</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="vegetables-tab" data-toggle="tab" href="#vegetables" role="tab" aria-controls="vegetables" aria-selected="false">@lang('products.characteristics')</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="fruits-tab" data-toggle="tab" href="#fruits" role="tab" aria-controls="fruits" aria-selected="false">@lang('products.additional_info')</a>
                    </li>
                </ul>
                <div class="tab-content shop_info_tab">
                    <div class="tab-pane active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                        {!!$product->description!!}
                    </div>
                    <div class="tab-pane fade" id="vegetables" role="tabpanel" aria-labelledby="vegetables-tab">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                    </div>
                    <div class="tab-pane fade" id="fruits" role="tabpanel" aria-labelledby="fruits-tab">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>                        
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="row">
        <div class="col-12 popular-products">
            <div class="popular-products-header">
                @include('public.blocks.page_header', ['title' => __('products.popular-goods')])
            </div>
            <div class='products-data row shop_container'>
                @foreach($similarProducts as $similarProduct)
                    @include('public.products.product_card', ['product' => $similarProduct, 'customClasses' => 'col-sm-4'])
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script>
        $('.product-plus').click(function(){
            var input = $(this).siblings('input[name="quantity"]')
            var newValue = parseInt(input.val()) + 1
            input.val(newValue)
            $('.add-product-to-cart').data('quantity', newValue)
        })
        $('.product-minus').click(function(){
            var input = $(this).siblings('input[name="quantity"]')
            var minOrder = parseInt(input.attr('min'))
            var newValue = parseInt(input.val()) - 1
            if(newValue >= minOrder){
                input.val(newValue)
                $('.add-product-to-cart').data('quantity', newValue)
            }
        })
    </script>
@endpush

