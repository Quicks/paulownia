@push('css')
    <link rel="stylesheet" href="{{asset('css/services.css') }}?v10">
@endpush

<div class="our-services" style="position: relative">
    <div class="row mx-auto services-ident">
        <div class="col-12">
            <p class="services-title text-center">Our services</p>
            <hr class="services-line">
        </div>
        <div id="carouselExampleIndicators1" class="carousel slide col-xl-12 col-md-10 col-sm-10 mx-auto"
             data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-md-6 col-sm-12 services-1 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap" style="max-width: 150px">
                                <p class="services-item-title">Sale of seedlings and paulownia trees</p>
                            </div>
                            <div class="services-text-wrap">
                                <p class="services-item-text">Sale of seedlings and paulownia trees, Sale of seedlings
                                    and paulownia
                                    trees
                                    Sale of seedlings and paulownia trees...</p>
                                <a class="services-item-link" href="{{route('public.service.index')}} ">Read more</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 services-2 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap" style="max-width: 150px">
                                <p class="services-item-title">@lang('header-footer.analysis and personal design')</p>
                            </div>
                            <div class="services-text-wrap">
                                <p class="services-item-text">Analysis and personal design of future plantations
                                    Analysis and personal design of future plantations...</p>
                                <a class="services-item-link" href="{{route('public.analysis-and-personal-design.index')}}">Read more</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 services-3 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap pt-3" style="max-width: 150px">
                                <p class="services-item-title">ROI calculation</p>
                            </div>
                            <div class="services-text-wrap pt-4">
                                <p class="services-item-text pt-3">Calculation of return on investment Calculation of
                                    return
                                    on
                                    investment Calculation of return on...</p>
                                <a class="services-item-link" href="{{route('public.calculations.index')}}">Read
                                    more</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 services-4 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap" style="max-width: 150px">
                                <p class="services-item-title">@lang('header-footer.consultation during the cultivation')</p>
                            </div>
                            <div class="services-text-wrap">
                                <p class="services-item-text">Consultation during the cultivation Consultation during
                                    the
                                    cultivation Consultation during the...</p>
                                <a class="services-item-link" href="{{route('public.consultation-during-the-cultivation.index')}}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-md-6 col-sm-12 services-1 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap" style="max-width: 150px">
                                <p class="services-item-title">Sale of seedlings and paulownia trees</p>
                            </div>
                            <div class="services-text-wrap">
                                <p class="services-item-text">Sale of seedlings and paulownia trees, Sale of seedlings
                                    and paulownia
                                    trees
                                    Sale of seedlings and paulownia trees...</p>
                                <a class="services-item-link" href="{{route('public.service.index')}} ">Read more</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 services-2 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap" style="max-width: 150px">
                                <p class="services-item-title">@lang('header-footer.analysis and personal design')</p>
                            </div>
                            <div class="services-text-wrap">
                                <p class="services-item-text">Analysis and personal design of future plantations
                                    Analysis and personal design of future plantations...</p>
                                <a class="services-item-link" href="{{route('public.analysis-and-personal-design.index')}}">Read more</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 services-3 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap pt-3" style="max-width: 150px">
                                <p class="services-item-title">ROI calculation</p>
                            </div>
                            <div class="services-text-wrap pt-4">
                                <p class="services-item-text pt-3">Calculation of return on investment Calculation of
                                    return
                                    on
                                    investment Calculation of return on...</p>
                                <a class="services-item-link" href="{{route('public.calculations.index')}}">Read
                                    more</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 services-4 mx-auto services-item-width">
                            <div class="mx-auto services-item-wrap" style="max-width: 150px">
                                <p class="services-item-title">@lang('header-footer.consultation during the cultivation')</p>
                            </div>
                            <div class="services-text-wrap">
                                <p class="services-item-text">Consultation during the cultivation Consultation during
                                    the
                                    cultivation Consultation during the...</p>
                                <a class="services-item-link" href="{{route('public.consultation-during-the-cultivation.index')}}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev services-prev" href="#carouselExampleIndicators1" role="button"
               data-slide="prev">
                <img class="lazyload" data-src="{{asset('/images/arrow-left.svg')}}">
            </a>
            <a class="carousel-control-next services-next" href="#carouselExampleIndicators1" role="button"
               data-slide="next">
                <img class="lazyload" data-src="{{asset('/images/arrow-right.svg')}}">
            </a>
        </div>
    </div>
    <div class="services-img-leaf-position">
        <img class="img-leaf lazyload" data-src="{{asset('/images/service-leaf-tree.png')}}">
    </div>
</div>