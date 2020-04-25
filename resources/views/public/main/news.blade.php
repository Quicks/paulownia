
<!-- START SECTION BLOG -->
<section class="pb_20">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <h2>Blog News</h2>
                    </div>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
          @foreach($news as $newsItem)
            @include('public/news/card', ['newsItem' => $newsItem])
          @endforeach
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->
