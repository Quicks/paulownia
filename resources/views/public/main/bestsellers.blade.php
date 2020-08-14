<!-- START SECTION PRODUCT -->
<section class="pb_70">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-sm-10 text-center">
                <div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <h2>
                        <a href='{{route("public.products.index")}}'>@lang('products.all-goods')</a>
                    </h2>
                </div>
                <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="product_content">
                    <ul class="nav nav-tabs justify-content-center animation" data-animation="fadeInUp" data-animation-delay="0.04s" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link active" id="all" data-toggle="tab" href="#allproducts" role="tab" aria-controls="allproducts" aria-selected="true"><span class="pr_icon1"></span>All Product</a>
                      </li>
                      @foreach($categories as $category)
                        @if(count($category->products))
                            <li class="nav-item">
                                <a class="nav-link" id="tab1" data-toggle="tab" href="#tab-category-{{str_replace(' ', '', $category->name)}}" role="tab" data-category-id="{{$category->id}}" aria-controls="tab-category-{{str_replace(' ', '', $category->name)}}" aria-selected="true"><span class="pr_icon1"></span>{{$category->name}}</a>
                            </li>
                        @endif
                      @endforeach
                    </ul>
                    <div class="small_divider clearfix"></div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="allproducts" role="tabpanel" aria-labelledby="allproducts">
                            <div class="row animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                                @foreach($products as $product)
                                    @include('public.products.product_card', ['product' => $product, 'customClasses' => 'col-xl-3'])
                                @endforeach
                            </div>
                        </div>
                      @foreach($categories as $category)
                        @if(count($category->products))
                            <div class="tab-pane fade" id="tab-category-{{str_replace(' ', '', $category->name)}}" role="tabpanel" aria-labelledby="tab-category-{{str_replace(' ', '', $category->name)}}">
                            <div class="row animation" data-animation="fadeInUp" data-animation-delay="0.05s">
															
                                </div>
                            </div>
                        @endif
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlap_shape">
        <div class="ol_shape8">
            <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
                <img data-parallax='{"y": -30, "smoothness": 20}' src="/images/shape25.png" alt="shape25"/>
            </div>
        </div>
        <div class="ol_shape9">
            <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
                <img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape26.png" alt="shape26"/>
            </div>
        </div>
        <div class="ol_shape10">
            <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
                <img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape27.png" alt="shape27"/>
            </div>
        </div>
        <div class="ol_shape11">
            <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape28.png" alt="shape28"/>
            </div>
        </div>
        <div class="ol_shape12">
            <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape29.png" alt="shape29"/>
            </div>
        </div>
        <div class="ol_shape13">
            <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape30.png" alt="shape30"/>
            </div>
        </div>
        <div class="ol_shape14">
            <div class="bounceimg" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape31.png" alt="shape31"/>
            </div>
        </div>
    </div>
</section>
<!-- START SECTION PRODUCT -->

@push('scripts')
	<script>
		$(document).ready(function(){
			resizeCardsHeight('.product')
			$('.nav-item').click(function(){
				var category = $(this).find('a').attr('aria-controls')
                var categoryId = $(this).find('a').data('category-id')
				if(category != 'allproducts'){
					$.ajax({
                        url: '/products/by_category/' + categoryId,
                        data: {
                            customClasses: 'col-xl-3',
                            limit: 1000
                        },
						success: function(response){

                            $('#' + category + ' .row').html(response)
                            resizeCardsHeight('.product')

						}
					})
				}
				
			})
		})	

		
	</script>
@endpush