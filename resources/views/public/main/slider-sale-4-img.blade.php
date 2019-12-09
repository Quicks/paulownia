@push('css')
    <link rel="stylesheet" href="{{asset('css/slider-sale.css') }}?v2">
@endpush

<div class="fon">
    {{--slider-sale--}}
    <div class="back-image to-769">
        <div class="container ">
            <div class="row ">
                <div class="col ">
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
                                    <div class="col col-xl-3 cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-1-2.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                3%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col col-xl-3 cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload"data-src="{{asset('/images/slider2-2-1.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                40%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col col-xl-3 cf p-0">
                                        <a href="#">
                                            <img class="w-100 position-relative lazyload" data-src="{{asset('/images/slider2-2-1.png')}}">
                                            <div class="image-fon text-center position-absolute">
                                                40%
                                            </div>
                                            <p class="text-fon text-center">Seedlings by 10 cm in high</p>
                                        </a>
                                    </div>
                                    <div class="col col-xl-3 cf p-0">
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
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#sale-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container from-768">
        @include('public.main.slider-sale-1-img')
    </div>

    @include('public.main.about-us')

</div>

