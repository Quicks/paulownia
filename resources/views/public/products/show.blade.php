@extends('layouts.public')

@section('content')
    @include('public.breadcrumbs', [
        $breadcrumbs = [
            route('public.news.index') => 'products.all-goods',
            route('public.news.show') => $product->title,

        ],
        $pageTitle = $product->name
    ])

<!-- START SECTION SHOP DETAIL -->
<section>
    <div class="container">
    	<div class="row">
        	<div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                      <div class="product-image">
                         <!-- <span class="pr_flash bg_green">Sale</span> -->
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
                    <div class="col-md-6">
                        <div class="pr_detail">
                          <div class="product-description">
                            <div class="product-title">
                              <h4><a href="#">{{$product->name}}</a></h4>
                            </div>
                            <div class="product_price float-left">
                                <span class="price">${{number_format($product->price, 2, ',', ' ')}}</span>
                            </div>
                            <div class="rating mt-2 float-right"><div class="product_rate" style="width:80%"></div></div>
                            <div class="clearfix"></div>
                            <hr>
                            <p>{!!$product->short_description!!}</p>
                          </div>
                          <hr>
                          <div class="cart_extra">
                            <!-- <div class="cart-product-quantity">
                              <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                              </div>
                            </div> -->
                            <div class="cart_btn">
                                <button class="btn btn-default btn-radius btn-sm btn-addtocart add-product-to-cart" data-product-id="{{$product->product_id}}" data-quantity='1' type="button">@lang('products.add-cart')</button>
                                <a class="add_wishlist" data-product-id="{{$product->product_id}}" href="#"><i class="ti-heart"></i></a>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <hr>
                          <ul class="product-meta list_none">
                            <li>
                                Category:
                                @foreach($product->product->categories as $category)
                                    <a href="#">{{$category->name}}</a>
                                @endforeach
                            </li>
                          </ul>
                          <div class="product_share d-block d-sm-flex align-items-center">
                            <span>Share with:</span>
                              <ul class="list_none social_icons border_social rounded_social">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row">
        	<div class="col-12">
            	<div class="medium_divider clearfix"></div>
            </div>
        </div>
        		<div class="row">
        	<div class="col-12">
            	<div class="tab-style1">
            		<ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">
                            @lang('products.product-information')
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                      </li> -->
                      <li class="nav-item">
                        <a class="nav-link" id="Comments-tab" data-toggle="tab" href="#Comments" role="tab" aria-controls="Comments" aria-selected="false">{{__('comments.comment')}} ({{count($product->comments)}})</a>
                      </li>
                    </ul>
                	<div class="tab-content shop_info_tab">
                      <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        {!!$product->description!!}
                      </div>
                      <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                        <table class="table table-bordered">
                            <tr>
                                <td>Weight</td>
                                <td>1 Kg</td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>Red, Green</td>
                            </tr>
                            <tr>
                                <td>Dimensions</td>
                                <td>15 × 10 × 20 cm</td>
                            </tr>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        <div class="comments">
                            <h5>2 Review For Fresh Organic Strawberry</h5>
                            <ul class="list_none comment_list mt-4">
                                <li>
                                    <div class="comment_img">
                                        <img src="assets/images/client_img1.jpg" alt="client_img1"/>
                                    </div>
                                    <div class="comment_block">
                                        <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                        <p class="customer_meta">
                                            <span class="review_author">Alea Brooks</span>
                                            <span class="comment-date">March 5, 2018</span>
                                        </p>
                                        <div class="description">
                                            <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment_img">
                                        <img src="assets/images/client_img2.jpg" alt="client_img2"/>
                                    </div>
                                    <div class="comment_block">
                                        <div class="rating"><div class="product_rate" style="width:100%"></div></div>
                                        <p class="customer_meta">
                                            <span class="review_author">Grace Wong</span>
                                            <span class="comment-date">June 17, 2018</span>
                                        </p>
                                        <div class="description">
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="review_form field_form">
                            <h5>Add a review</h5>
                            <form class="row mt-3">
                                <div class="form-group col-12">
                                    <p class="star_rating">
                                        <span data-value="1"><i class="ion-android-star"></i></span>
                                        <span data-value="2"><i class="ion-android-star"></i></span>
                                        <span data-value="3"><i class="ion-android-star"></i></span>
                                        <span data-value="4"><i class="ion-android-star"></i></span>
                                        <span data-value="5"><i class="ion-android-star"></i></span>
                                    </p>
                                </div>
                                <div class="form-group col-12">
                                    <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                 </div>
                                <div class="form-group col-md-6">
                                    <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                </div>

                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-default" name="submit" value="Submit">Submit Review</button>
                                </div>
                            </form>
                        </div> -->
                      </div>
                      <div class="tab-pane fade" id="Comments" role="tabpanel" aria-labelledby="Comments-tab">
                          @if($product->comments()->parents()->get())
                              @include('public.comments.index', [
                                  'comments' => $product->comments()->parents()->get(),
                                  'model' => $product
                              ])
                          @endif
                          @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                              <div class="posts-title">
                                  <h5>{{ __('comments.write_a_comment')}}</h5>
                              </div>
                              @include('public.comments.form', [
                                  'commentable_id' => $product->id,
                                  'commentable_type' => get_class($product),
                                  'parent_id' => 0,
                              ])
                          @else
                              <div class="field_form form_style2">
                                  <div class="posts-title">
                                      <h5>{{ __('comments.leave_comment')}}</h5>
                                  </div>
                                  <div class="posts-title">
                                      {{ __('comments.leave_comment_message_begin')}}
                                      <a href="/customer/login">{{ __('comments.leave_comment_message_logged_in')}}</a>
                                      {{ __('comments.leave_comment_message_end')}}
                                  </div>
                              </div>
                          @endif
                      </div>
                	</div>
                </div>
            </div>
        </div>
        		<div class="row">
                    <div class="col-12">
                        <div class="medium_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s2 m-0">
                            <h3>@lang('products.similar-products')</h3>
                        </div>
                        <div class="small_divider clearfix"></div>
                        <div class="product_slider carousel_slide3 owl-carousel owl-theme nav_top_right2" data-margin="30" data-nav="true" data-dots="false">
                            @foreach($similarProducts as $similarProduct)
                                @include('public.products.product_card', ['product' => $similarProduct, 'customClasses' => 'col-lg-12'])
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        	<div class="col-lg-3 order-lg-first mt-5 mt-lg-0">
            	<div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="list_none widget_categories border_bottom_dash">
                            <li><a href="#"><span class="categories_name">Dried Products</span><span class="categories_num">(9)</span></a></li>
                            <li><a href="#"><span class="categories_name">Vegetables</span><span class="categories_num">(6)</span></a></li>
                            <li><a href="#"><span class="categories_name">Fruits Fresh</span><span class="categories_num">(4)</span></a></li>
                            <li><a href="#"><span class="categories_name">Juice</span><span class="categories_num">(7)</span></a></li>
                            <li><a href="#"><span class="categories_name">Fresh Meal</span><span class="categories_num">(12)</span></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Recent Items</h5>
                        <ul class="recent_post border_bottom_dash list_none">
                            <li>
                                <div class="post_img">
                                    <a href="#"><img src="assets/images/shop_small1.jpg" alt="shop_small1"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="#">100% Organic Juices</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:100%"></div></div>
                                    <div class="product_price"><span class="price">$33.00</span></div>
                                </div>
                            </li>
                            <li>
                                <div class="post_img">
                                    <a href="#"><img src="assets/images/shop_small2.jpg" alt="shop_small2"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="#">Fresh Organic Grapes</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                    <div class="product_price"><span class="price">$40.00</span></div>
                                </div>
                            </li>
                            <li>
                                <div class="post_img">
                                    <a href="#"><img src="assets/images/shop_small3.jpg" alt="shop_small3"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="#">Fresh Organic Tomato</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:60%"></div></div>
                                    <div class="product_price"><span class="price">$54.00</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">tags</h5>
                        <div class="tags">
                        	<a href="#">General</a>
                            <a href="#">Design</a>
                            <a href="#">jQuery</a>
                            <a href="#">Branding</a>
                            <a href="#">Modern</a>
                            <a href="#">Blog</a>
                            <a href="#">Quotes</a>
                            <a href="#">Advertisement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION SHOP DETAIL -->
<!-- END SECTION NEWSLATTER -->
<section class="bg_light_green newslatter_wrap">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8 text-center">
                <div class="heading_s2 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <h2>Subscribe Our Newsletter</h2>
                </div>
                <p class="m-0 animation" data-animation="fadeInUp" data-animation-delay="0.03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                <div class="small_divider"></div>
                <div class="newsletter_form animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <form>
                        <div class="rounded_input">
                           <input type="text" class="form-control" required="" placeholder="Enter your Email Address">
                        </div>
                        <button type="submit" title="Subscribe" class="btn btn-default" name="submit" value="Submit">subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overlap_shape">
        <div class="ol_shape19">
            <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="assets/images/shape34.png" alt="shape34"/>
            </div>
        </div>
        <div class="ol_shape20">
            <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="assets/images/shape35.png" alt="shape35"/>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION NEWSLATTER -->


@endsection