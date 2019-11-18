<div class="header pb-1">
    <div class="header-content mx-auto">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6 text-xl-center mt-md-3 mt-sm-3">
                <a href="{{route('main')}}">
                    <img src="{{asset('images/logo.png')}}">
                </a>
            </div>
            <div class="col-xl-9 col-md-6 mt-md-3 mt-sm-3">
                <nav class="navbar navbar-expand-xl navbar-light">
                    <div id="all-pages" class="navbar-collapse collapse row">
                        <div class="col-xl-9">
                            <ul class="d-xl-inline-flex list-unstyled">
                                <li class="mb-3">
                                    <a href="viber://chat?number=+34642787555">
                                        <img src="{{asset('images/viber-icon.svg')}}">
                                        +34 <b>642 787 555</b>
                                    </a>
                                </li>
                                <li class="ml-xl-4 mb-3">
                                    <a href="mailto: info@paulownia.pro">info@paulownia.pro</a>
                                </li>
                                <li class="ml-xl-4 mb-3">
                                    <img src="{{asset('images/hours-8.svg')}}">
                                    Mn. - Fr. 09:00 - 18:00
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3">
                            <div class="dropdown pl-xl-5 mb-4">
                                <button class="button-language" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{(App::getLocale())}}
                                    <img src="{{asset('images/down-arrow.svg')}}">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(config('translatable.locales') as $locale)
                                        <a class="dropdown-item"
                                            @if(App::getLocale() != Request::segment(1))
                                                href="{{url($locale. '/' . Request::path())}}"
                                            @else
                                                href="{{Request::root() .'/'. $locale . substr(Request::path(), 2)}}"
                                            @endif">
                                                {{strtoupper($locale)}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <ul class="navbar-nav bottom-link" style="flex-wrap: wrap;">
                                <li class="nav-item  mr-xl-5">
                                    <a @if(url()->current() === route('main')) class="bottom-link-activ" @endif href="{{route('main')}}">
                                        @lang('header-footer.main')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-5">
                                    <a @if(url()->current() === route('public.news.index')) class="bottom-link-activ" @endif href="{{route('public.news.index')}}">
                                        @lang('header-footer.news')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-5">
                                    <a @if(url()->current() === route('public.paulownia.index')) class="bottom-link-activ" @endif href="{{route('public.paulownia.index')}}">
                                        @lang('header-footer.paulownia')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-5">
                                    <a @if(url()->current() === route('public.products.index')) class="bottom-link-activ" @endif  href="{{route('public.products.index')}}">
                                        @lang('header-footer.goods')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-4">
                                    <a @if(url()->current() === route('public.calculations.index')) class="bottom-link-activ" @endif  href="{{route('public.calculations.index')}}">
                                        @lang('header-footer.profitability calculation')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-5">
                                    <a @if(url()->current() === route('public.galleries.index')) class="bottom-link-activ" @endif href="{{route('public.galleries.index')}}">
                                        @lang('header-footer.gallery')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-5">
                                    <a @if(url()->current() === route('public.faq.index')) class="bottom-link-activ" @endif  href="{{route('public.faq.index')}}">
                                        @lang('header-footer.faq')
                                    </a>
                                </li>
                                <li class="nav-item mr-xl-5">
                                    <a @if(url()->current() === route('public.about-us.index')) class="bottom-link-activ" @endif  href="{{route('public.about-us.index')}}">
                                        @lang('header-footer.about us')
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @if(url()->current() === route('public.contacts.index')) class="bottom-link-activ" @endif href="{{route('public.contacts.index')}}">
                                        @lang('header-footer.contacts')
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3">
                            <ul class="navbar-nav">
                                <li class="nav-item ml-xl-5">
                                    <img src="{{asset('images/line.svg')}}">
                                </li>
                                <li class="nav-item ml-xl-3">
                                    <a href="#"><img src="{{asset('images/user.svg')}}"></a>
                                </li>
                                <li class="nav-item ml-xl-3">
                                    <a href="#"><img src="{{asset('images/shopping-cart.svg')}}"></a>
                                </li>
                                <li class="nav-item ml-xl-3">
                                    <a href="#"><img src="{{asset('images/favorite-heart-button.svg')}}"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#all-pages" aria-controls="all-pages" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</div>