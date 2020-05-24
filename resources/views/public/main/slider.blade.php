<!-- START SECTION BANNER -->
<section class="banner_slider banner_slide_half p-0">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item bg_light_green {{$loop->index == 0 ? 'active' : ''}}">
            	<div class="banner_slide_content slide_content_wrap">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-7">
                                <div class="banner_content3 pl-lg-5 animation" data-animation="fadeIn" data-animation-delay="0.4s" data-parallax='{"y": 30, "smoothness": 10}'>
                            <h2 class="animation font_style1" data-animation="fadeInDown" data-animation-delay="0.5s">
                                {{$slider->title}}
                            </h2>
                            <p class="animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                {!!$slider->text!!}
                            </p>
                            <a class="btn btn-default animation" href="{{$slider->link}}" target='_blank' rel="noopener noreferrer" data-animation="fadeInUp" data-animation-delay="0.7s">Learn More</a>
                            <!-- <a class="btn btn-white animation" href="#" data-animation="fadeInUp" data-animation-delay="0.8s">Contact Us</a> -->
                        </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                            	<div class="banner_slider_img animation" data-animation="bounceInUp" data-animation-delay="0.4s">
                                    <img class="bounceimg" src="/storage/{{$slider->image->image}}" alt="banner_slider_img1"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_shape">
                    <div class="shape22">
                    	<div class="animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": -30, "smoothness": 20}' src="/images/shape51.png" alt="shape51"/>
                        </div>
                    </div>
                    <div class="shape23">
                    	<div class="animation" data-animation="slideInDown" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape52.png" alt="shape52"/>
                        </div>
                    </div>
                    <div class="shape24">
                    	<div class="animation" data-animation="bounceInDown" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape53.png" alt="shape53"/>
                        </div>
                    </div>
                    <div class="shape25">
                    	<div class="animation" data-animation="slideInRight" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape54.png" alt="shape54"/>
                        </div>
                    </div>
                    <div class="shape26">
                    	<div class="animation" data-animation="bounceInUp" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape55.png" alt="shape55"/>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="carousel-item bg_light_pink">
            	<div class="banner_slide_content slide_content_wrap">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-7">
                                <div class="banner_content3 pl-lg-5 animation" data-animation="fadeIn" data-animation-delay="0.4s" data-parallax='{"y": 30, "smoothness": 10}'>
                            <h2 class="animation font_style1" data-animation="fadeInDown" data-animation-delay="0.5s">Organic Fresh Fruits For Your Health</h2>
                            <p class="animation" data-animation="fadeInUp" data-animation-delay="0.6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                            <a class="btn btn-default animation" href="#" data-animation="fadeInUp" data-animation-delay="0.7s">Learn More</a>
                            <a class="btn btn-white animation" href="#" data-animation="fadeInUp" data-animation-delay="0.8s">Contact Us</a>
                        </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                            	<div class="banner_slider_img animation" data-animation="bounceInUp" data-animation-delay="0.4s">
                                    <img class="bounceimg" src="/images/banner_slider_img2.png" alt="banner_slider_img2"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_shape">
                    <div class="shape22">
                    	<div class="animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": -30, "smoothness": 20}' src="/images/shape51.png" alt="shape51"/>
                        </div>
                    </div>
                    <div class="shape23">
                    	<div class="animation" data-animation="slideInDown" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape52.png" alt="shape52"/>
                        </div>
                    </div>
                    <div class="shape24">
                    	<div class="animation" data-animation="bounceInDown" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape53.png" alt="shape53"/>
                        </div>
                    </div>
                    <div class="shape25">
                    	<div class="animation" data-animation="slideInRight" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape54.png" alt="shape54"/>
                        </div>
                    </div>
                    <div class="shape26">
                    	<div class="animation" data-animation="bounceInUp" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape55.png" alt="shape55"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item bg_light_green">
            	<div class="banner_slide_content slide_content_wrap">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-7">
                                <div class="banner_content3 pl-lg-5 animation" data-animation="fadeIn" data-animation-delay="0.4s" data-parallax='{"y": 30, "smoothness": 10}'>
                            <h2 class="animation font_style1" data-animation="fadeInDown" data-animation-delay="0.5s">Organic Fresh Fruits For Your Health</h2>
                            <p class="animation" data-animation="fadeInUp" data-animation-delay="0.6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                            <a class="btn btn-default animation" href="#" data-animation="fadeInUp" data-animation-delay="0.7s">Learn More</a>
                            <a class="btn btn-white animation" href="#" data-animation="fadeInUp" data-animation-delay="0.8s">Contact Us</a>
                        </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                            	<div class="banner_slider_img animation" data-animation="bounceInUp" data-animation-delay="0.4s">
                                    <img class="bounceimg" src="/images/banner_slider_img3.png" alt="banner_slider_img3"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_shape">
                    <div class="shape22">
                    	<div class="animation" data-animation="slideInLeft" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": -30, "smoothness": 20}' src="/images/shape51.png" alt="shape51"/>
                        </div>
                    </div>
                    <div class="shape23">
                    	<div class="animation" data-animation="slideInDown" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape52.png" alt="shape52"/>
                        </div>
                    </div>
                    <div class="shape24">
                    	<div class="animation" data-animation="bounceInDown" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape53.png" alt="shape53"/>
                        </div>
                    </div>
                    <div class="shape25">
                    	<div class="animation" data-animation="slideInRight" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape54.png" alt="shape54"/>
                        </div>
                    </div>
                    <div class="shape26">
                    	<div class="animation" data-animation="bounceInUp" data-animation-delay="0.5s">
                    		<img data-parallax='{"y": 30, "smoothness": 20}' src="/images/shape55.png" alt="shape55"/>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</section>
<!-- END SECTION BANNER -->