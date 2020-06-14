<!-- START SECTION BLOG -->
<section class="bg_gray pb_70">
	<div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="text-center">
          <div class="heading_s3 text-center animation" data-animation="fadeInDown" data-animation-delay="0.02s">
            <div class="sub_heading">Letest Articles</div>
              <h2>Our Blog & News</h2>
          </div>
          <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus<br class="d-none d-md-block"> blandit massa enim. Nullam id varius nunc id varius nunc.</p>
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
