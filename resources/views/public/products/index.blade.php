@extends('layouts.public')
@section('content')

<section>
	<div class="container">
    	<div class="row">	
        	<div class="col-lg-9">
            	<div class="row align-items-center justify-content-between pb-1 mb-4">
                	<div class="col-auto">
                    	<div class="custom_select">
                    	<select>
                        	<option value="default">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="date">Sort by newness</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-auto">
                    	<span class="align-middle">Showing 1-9 of 50 results</span>
                        <div class="list_grid_icon">
                            <a href="javascript:Void(0);" class="shorting_icon grid_view active"><i class="ion-grid"></i></a>
                            <a href="javascript:Void(0);" class="shorting_icon list_view"><i class="ion-navicon-round"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row shop_container grid_view">
                  @foreach($products as $product)
                    @include('public.products.product_card', ['product' => $product])
                  @endforeach
                  
                    
                </div>
                <div class="row">
                    <div class="col-12 mt-3 mt-lg-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="ion-ios-arrow-thin-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="ion-ios-arrow-thin-right"></i></a></li>
                        </ul>
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
                    	<h5 class="widget_title">Filter</h5>
                        <div class="filter_price">
                             <div id="price_filter"></div>
                             <div class="d-flex align-items-center justify-content-between">
                                 <span>Price <span id="flt_price"></span></span>
                                 <input type="hidden" id="price_first">
                                 <input type="hidden" id="price_second">
                                 <button type="submit" class="btn btn-default btn-sm">Filter</button>
                             </div>
                         </div>
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


