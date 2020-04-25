<!-- START SECTION FEATURE PRODUCT -->
<section>
	<div class="container">	
    	<div class="row">
        	<div class="col-lg-6 col-md-8">
                <div class="heading_s1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <h2>Featured Products</h2>
                </div>
                <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                <div class="small_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
            	<div class="product_slider product_list carousel_slide3 owl-carousel owl-theme nav_top_right" data-margin="30" data-dots="false" data-nav="true">
                    @foreach($products->chunk(3) as $productsChunk)
                        <div class="items">
                            @foreach($productsChunk as $product)
                                <div class="product">
                                    <div class="product_img">
                                        <a href="#">
                                            <img src="{{$product->thumbnail}}" alt="product_img1"/>
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                <li><a href="#"><i class="ti-shopping-cart"></i></a></li>
                                                <li><a href="http://bestwebcreator.com//organiq/demo/shop-quick-view.html" class="popup-ajax"><i class="ti-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6><a href="#">{{$product->name}}</a></h6>
                                        <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                        <span class="price">{{$product->price}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION FEATURE PRODUCT -->
