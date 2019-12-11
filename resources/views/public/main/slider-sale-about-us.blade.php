@push('css')
    <link rel="stylesheet" href="{{asset('css/slider-sale.css') }}?v3">
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

    @include('public.main.about-us')

</div>

