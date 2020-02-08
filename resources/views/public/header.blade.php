@guest('customer')
    @include('public.auth-modal')
@endguest

<div class="header pb-1">
    <div class="row">
        <div class="col-xl-2 col-md-6 d-flex align-items-end mt-md-3 mt-sm-3 mx-md-auto logo-width">
            <a href="{{route('main')}}" >
                <img data-src="{{asset('images/logo.png')}}" class="lazyload" style="width:135%">
            </a>
        </div>
        <div class="col-xl-10 col-md-6 mt-md-3 mt-sm-3">
            <nav class="navbar navbar-expand-xl navbar-light">
                <div id="all-pages" class="navbar-collapse collapse row">
                    <div class="col-xl-10">
                        <ul class="d-xl-inline-flex list-unstyled">
                            <li class="mb-3">
                                <a class="info" href="viber://chat?number=+34642787555">
                                    <img src="{{asset('images/viber-icon.svg')}}" width="14px" height="14px">
                                    +34 <b>642 787 555</b>
                                </a>
                            </li>
                            <li class="ml-xl-4 mb-3">
                                <a class="info" href="mailto: info@paulownia.pro">info@paulownia.pro</a>
                            </li>
                            <li class="ml-xl-4 mb-3 info">
                                <img src="{{asset('images/hours-8.svg')}}" width="12px" height="12px">
                                Mn. - Fr. 09:00 - 18:00
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-2">
                        <div class="dropdown ml-xl-4 mb-4">
                            <button class="button-language info-lang" type="button" id="dropdownMenuButton"
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
                                        @endif
                                    >
                                        {{strtoupper($locale)}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <ul class="navbar-nav bottom-link" style="flex-wrap: wrap;">
                            <li class="nav-item mr-xl-3">
                                <a @if(url()->current() === route('public.news.index')) class="bottom-link-activ"
                                   @else class="info-menu" @endif href="{{route('public.news.index')}}">
                                    @lang('header-footer.news')
                                </a>
                            </li>
                            <li class="nav-item mr-xl-3">
                                <a @if(url()->current() === route('public.paulownia.about')||
                                url()->current() === route('public.paulownia.type')||
                                url()->current() === route('public.paulownia.planting')) class="bottom-link-activ"
                                   @else class="info-menu" @endif href="{{route('public.paulownia.about')}}">
                                    @lang('header-footer.paulownia')
                                </a>
                            </li>
                            <li class="nav-item mr-xl-3">
                                <a @if(url()->current() === route('public.products.index')) class="bottom-link-activ"
                                   @else class="info-menu" @endif  href="{{route('public.products.index')}}">
                                    @lang('header-footer.goods')
                                </a>
                            </li>
                            <li class="nav-item mr-xl-3">
                                <a @if(url()->current() === route('public.calculations.index')) class="bottom-link-activ"
                                   @else class="info-menu" @endif  href="{{route('public.calculations.index')}}">
                                    @lang('header-footer.profitability calculation')
                                </a>
                            </li>
{{--                            <li class="nav-item mr-xl-3">--}}
{{--                                <a @if(url()->current() === route('public.galleries.index')) class="bottom-link-activ"--}}
{{--                                   @else class="info-menu" @endif href="{{route('public.galleries.index')}}">--}}
{{--                                    @lang('header-footer.gallery')--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item mr-xl-3">
                                <a @if(url()->current() === route('public.faq.index')) class="bottom-link-activ"
                                   @else class="info-menu" @endif  href="{{route('public.faq.index')}}">
                                    @lang('header-footer.faq')
                                </a>
                            </li>
                            <li class="nav-item mr-xl-3">
                                <a @if(url()->current() === route('public.about-us.index')) class="bottom-link-activ"
                                   @else class="info-menu" @endif  href="{{route('public.about-us.index')}}">
                                    @lang('header-footer.about us')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a @if(url()->current() === route('public.contacts.index')) class="bottom-link-activ"
                                   @else class="info-menu" @endif href="{{route('public.contacts.index')}}">
                                    @lang('header-footer.contacts')
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-2">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img width="20px" height="20px" src="{{asset('images/line.svg')}}">
                            </li>
                            <li class="list-inline-item">
                                @guest('customer')
                                    <a href="#" data-toggle="modal" data-target="#AuthModal">
                                        <img width="20px" height="20px" src="{{asset('images/user.svg')}}">
                                    </a>
                                @endguest
                                @auth('customer')
                                    <a href="#" id="dropdownClientMenu" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img style="background-color: #8CBD02; border-radius: 10px;" width="20px" height="20px"
                                                src="{{asset('images/user.svg')}}">
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownClientMenu">
                                        <li class="dropdown-item-text ml-3">
                                            {{ auth()->guard('customer')->user()->first_name }}
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ route('profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                                        </li>
                                    </ul>
                                @endauth
                            </li>
                            <li class="list-inline-item position-relative">
                                <a href="{{route('public.cart.index')}}">
                                    <img width="20px" height="20px" src="{{asset('images/shopping-cart.svg')}}" >
                                    @if(Webkul\Checkout\Facades\Cart::getCart())
                                        <div class="cart-not-empty"></div>
                                    @endif
                                </a>
                            </li>
                            <li class="list-inline-item ">
                                <a href="{{ route('wishlist.index') }}">
                                    <img width="20px" height="20px" src="{{asset('images/favorite-heart-button.svg')}}">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="navbar-toggler mt-md-5" type="button" data-toggle="collapse" data-target="#all-pages"
                        aria-controls="all-pages" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </div>
</div>