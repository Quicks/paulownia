@push('css')
    <link rel="stylesheet" href="{{asset('css/slider-sale.css') }}?v3">
    <link rel="stylesheet" href="{{asset('css/about-us.css')}}?v4">
@endpush

<div class="fon">
    {{--slider-sale--}}
    <div class="back-image">
        <div class="container">
            <div class="row ml-3 mr-3">
                <div class="col">
                    <div id="sale-carousel" class="carousel slide " data-ride="carousel">
                        <!-- Carousel items -->
                        <div class="carousel-inner rounding">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-1-2.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                           3%
                                        </div>
                                        <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-2-1.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                40%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-2-1.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                40%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col  cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-1-2.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                3%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-1-2.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                3%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload"data-src="{{asset('/images/slider2-2-1.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                40%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-2-1.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                40%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-1-2.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                3%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->
                    <a class="carousel-control-prev " href="#sale-carousel" role="button" data-slide="prev">
                        <span aria-hidden="true">
                             <img class="lazyload" data-src="{{asset('/images/prev-actions.png')}}">
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#sale-carousel" role="button" data-slide="next">
                        <span aria-hidden="true" class="png-for-next">
                              <img class="lazyload" data-src="{{asset('/images/next-actions.png')}}">
                        </span>

                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{--about-us--}}
    <div class="text-center" style="margin: 5% 0 3% 0;">
        <div class="about-title font-weight-bold ">About us</div>
        <hr class="line-about-under">
    </div>

            <div class="row mx-auto back-ground-main pt-xl-5 pb-xl-5 p-3 back-max-width ">

                    <div class="col-xl-6 col-md-12 col-sm-12 back-ground-1 mx-auto mt-5 mb-5 ">
                        <img class="lazyload img-logo-1" data-src="/images/logo.png">
                        <p class="about-text">Paulownia Professional is a manufacturer of seedlings, popular species of Paulownia.
                            Our company has settled in Spain, the province of Aragon, whose production area is 2 hectares,
                            which allows us to produce more than half a million seedlings per year.
                            We offer an individual approach to each client,
                            a large selection of advanced varieties of Paulownia. We will also help you determine the variety that best suits your climate zone.
                            We set ourselves the task of growing high-quality,
                            certified seedlings that can satisfy the full range of applications of Paulownia...
                            <a href="#" class="about-read-m" >Read more</a>
                        </p>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12 back-ground-2 mx-auto mt-5 mb-5" >
                        <img class="lazyload img-logo-2 " data-src="/images/logo.png">
                        <p class="about-text">Paulownia Professional is a manufacturer of seedlings, popular species of Paulownia.
                            Paulownia Professiona's goal is to contribute to the improvement of environmental conditions in Aragon,
                            Spain and Europe as a whole !!! The creation of plantations and industrialization of Pavlovia,
                            as well as the creation of "green zones" and parks, will allow to save eco-resources, solve energy consumption
                            issues without environmental risks, increase the volume of animal feed production, globally
                            deal with emissions into the atmosphere, industrial enterprises, large amounts of CO2, toxic substances, heavy metals..
                            <a href="#" class="about-read-m" >Read more</a>
                        </p>
                    </div>
            </div>


</div>

