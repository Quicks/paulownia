@extends('layouts.public')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{asset('css/about-us-header.css') }}?v6">
    @endpush

    <div class="row fon-for-about-us-header m-0">
        <div class="col-12 line-bread pb-xl-5">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.about us' ])</div>
        <div class="col-11 mx-auto pt-3 text-about-us-header">@lang('about-us-header.text-about')
            <a href="#" class="read-m-about-header">@lang('about-us-header.read-more')</a></div>
        <div class="col-12 title-our-service mt-5 text-center">@lang('about-us-header.our-service')
        <hr class="about-us-line-1">
        </div>

        <div class="row mx-auto our-services-img">
            <div class=" col-xl-2 col-md-4 col-sm-6 card-img-width-about">
                <div class="text-center"><img data-src="{{asset('/images/about-us-header-1.png')}}" class="lazyload img-servise-style">
                </div>
                <div class="title-our-servise-about-us-header text-center">@lang('about-us-header.sale')</div>
                <div class="text-our-servise-about-us-header text-center pb-5">@lang('about-us-header.point-1')</div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 card-img-width-about">
                <div class="text-center"><img data-src="{{asset('/images/about-us-header-2.png')}}" class="lazyload img-servise-style">
                </div>
                <div class="title-our-servise-about-us-header text-center">@lang('about-us-header.sale')</div>
                <div class="text-our-servise-about-us-header text-center pb-5">@lang('about-us-header.wood')</div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                <div class="text-center"><img data-src="{{asset('/images/about-us-header-3.png')}}" class="lazyload img-servise-style">
                </div>
                <div class="title-our-servise-about-us-header text-center">@lang('about-us-header.calculation') </div>
                <div class="text-our-servise-about-us-header text-center pb-5">@lang('about-us-header.profitability-investment')</div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                <div class="text-center"><img data-src="{{asset('/images/about-us-header-4.png')}}" class="lazyload img-servise-style">
                </div>
                <div class="title-our-servise-about-us-header text-center">@lang('about-us-header.contracts')</div>
                <div class="text-our-servise-about-us-header text-center pb-5">@lang('about-us-header.sale-wood')</div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                <div class="text-center"><img data-src="{{asset('/images/about-us-header-5.png')}}" class="lazyload img-servise-style">
                </div>
                <div class="title-our-servise-about-us-header text-center">@lang('about-us-header.consultation') </div>
                <div class="text-our-servise-about-us-header text-center pb-5">@lang('about-us-header.throughout-growing')</div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                <div class="text-center"><img data-src="{{asset('/images/about-us-header-6.png')}}" class="lazyload img-servise-style">
                </div>
                <div class="title-our-servise-about-us-header text-center">@lang('about-us-header.projection')</div>
                <div class="text-our-servise-about-us-header text-center pb-5">@lang('about-us-header.future-plantations')</div>
            </div>
        </div>

        <div class="col-12 fon-for-slider-about-us-header p-0 position-relative">

            <div><img data-src="{{asset('/images/line-about-us-header-up.png')}}"
                      class="lazyload line-style-up-about-h "></div>

            <div class="col-12 mt-5 pt-4 text-center title-our-service">@lang('about-us-header.title-1')
                <hr class="about-us-line-2">
            </div>

            <div id="carouselExampleControls" class="carousel slide pt-5 pb-5" data-ride="carousel">
                <div class="carousel-inner text-center ">
                    <div class="carousel-item active">

                        <a href="{{asset('/images/certificates/certificate-1-about-r.jpg')}}" download>
                            <img class="lazyload pl-2 pr-2 img-slider-about-r" data-src="{{asset('/images/certificate-1-about-r.jpg')}}" alt="First slide"></a>


                        <a href="{{asset('/images/certificates/certificate-2-about-r.jpg')}}" download>
                        <img class="lazyload pl-2 pr-2 img-slider-about-r"
                             data-src="{{asset('/images/certificate-2-about-r.jpg')}}" alt="First slide"></a>


                        <a href="{{asset('/images/certificates/certificate-3-about-r.jpg')}}" download>
                        <img class="lazyload pl-2 pr-2 img-slider-about-r"
                             data-src="{{asset('/images/certificate-3-about-r.jpg')}}" alt="First slide"></a>


                        <a href="{{asset('/images/certificates/certificate-4-about-r.jpg')}}"
                           download><img class="lazyload pl-2 pr-2 img-slider-about-r" data-src="{{asset('/images/certificate-4-about-r.jpg')}}"
                                         alt="First slide"></a>

                    </div>
                    <div class="carousel-item">
                        <a href="{{asset('/images/certificates/certificate-1-about-r.jpg')}}" download>
                        <img class="lazyload pl-2 pr-2 img-slider-about-r"
                             data-src="{{asset('/images/certificate-1-about-r.jpg')}}" alt="First slide">
                        </a>

                        <a href="{{asset('/images/certificates/certificate-2-about-r.jpg')}}" download>
                        <img class="lazyload pl-2 pr-2 img-slider-about-r"
                             data-src="{{asset('/images/certificate-2-about-r.jpg')}}" alt="First slide">
                        </a>

                        <a href="{{asset('/images/certificates/certificate-3-about-r.jpg')}}" download>
                        <img class="lazyload pl-2 pr-2 img-slider-about-r"
                             data-src="{{asset('/images/certificate-3-about-r.jpg')}}" alt="First slide">
                        </a>

                        <a href="{{asset('/images/certificates/certificate-4-about-r.jpg')}}" download>
                        <img class="lazyload pl-2 pr-2 img-slider-about-r"
                             data-src="{{asset('/images/certificate-4-about-r.jpg')}}" alt="First slide">
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="botton-heigth-1">
                <a href="{{route('public.certificates-technical-doc.index')}}">
                    <button class="button-about-r-slider">@lang('about-us-header.button-1')</button>
                </a>
            </div>
            <div><img data-src="{{asset('/images/line-about-us-header-down.png')}}"
                      class="lazyload line-style-down-about-h "></div>
        </div>
    </div>

        <div class="row fon-our-partners">
        <div class="col-12 mt-5 pt-4 text-center title-our-service">@lang('about-us-header.our-partners')
            <hr class="about-us-line-1">
        </div>
            @foreach($partners as $item)
                <div class="col-xl-3 col-md-12 col-sm-12 justify-content-center mx-auto pb-xl-5 pt-xl-3">
                    <div class="partner text-center pt-5 pb-5">{{$item->name}}</div>
                </div>
            @endforeach
        <div class="col-12 botton-heigth-2 text-center">
            <a href="{{route('public.partners.index') }}">
                <button class="button-about-r-partners">@lang('about-us-header.button-1')</button>
            </a>
        </div>

        <div class="col-12 text-center title-our-service">@lang('about-us-header.our-clients')
            <hr class="about-us-line-1">
        </div>

            <div class="col-12">
                <img data-src="{{asset('/images/map-about-us-r.png')}}" class="lazyload map-about-style position-relative">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute america-1">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute america-2">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute europa-1">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute europa-2">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute europa-3">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute rus">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute africa-1">
                <img data-src="{{asset('images/pointMap.svg')}}" class="lazyload position-absolute africa-2">

            </div>
            <div class="col-12 mb-5"></div>

    </div>
@endsection



