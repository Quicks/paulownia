<!-- START SECTION BLOG -->
<section class="bg_gray pb_70">
	<div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="text-center">
          <div class="heading_s3 text-center animation" data-animation="fadeInDown" data-animation-delay="0.02s">
            <div class="sub_heading">@lang('public.blog.sub_title')</div>
              <h2>@lang('public.blog.title')</h2>
          </div>
          <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
            @lang('public.blog.description')
          </p>
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
