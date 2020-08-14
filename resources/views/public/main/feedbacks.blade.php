<!-- START SECTION TESTIMONIAL -->
<section class="background_bg bg_fixed testimonial_bg" data-img-src="/images/testimonial_bg.png">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="heading_s2 text-center">
                    	<h2>@lang('public.our_services.title')</h2>
                    </div>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                        @lang('public.our_services.descripton')
                    </p>
                </div>
                <div class="small_divider"></div>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
            	<div class="testimonial_slider testimonial_style2 carousel_slide3 owl-carousel owl-theme" data-margin="30" data-loop="true" data-autoplay="true" data-dots="false" data-center="true">
                    @foreach($ourServices as $ourService)
                        <div class="testimonial_box">
                            <div class="testi_desc">
                                    <p>
                                        {!!$ourService->text!!}
                                    </p>
                                </div>
                            <div class="testi_meta">
                                <div class="testimonial_img">
                                    <img src="/images/client_img1.jpg" alt="client">
                                </div>
                                <div class="testi_user">
                                    <h5>{!!$ourService->title!!}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION TESTIMONIAL -->
