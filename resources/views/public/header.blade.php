<div class="header pb-1">
    <div class="header-content mx-auto">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6 text-xl-center mt-md-3 mt-sm-3">
                <a href="/">
                    <img src="{{asset('images/logo.png')}}">
                </a>
            </div>
            <div class="col-xl-9 col-md-6 col-sm-6 mt-md-3 mt-sm-3">
                <div class="row">
                    <div class="col-xl-9 col-md-12 col-sm-12">
                        <ul class="d-xl-inline-flex list-unstyled">
                            <li class="ml-4 mb-3">
                                <a href="viber://chat?number=+34642787555">
                                    <img src="{{asset('images/viber-icon.svg')}}">
                                    +34 <b>642 787 555</b>
                                </a>
                            </li>
                            <li class="ml-4 mb-3">
                                <a href="mailto: info@paulownia.pro">info@paulownia.pro</a>
                            </li>
                            <li class="ml-4 mb-3">
                                <img src="{{asset('images/hours-8.svg')}}">
                                Mn. - Fr. 09:00 - 18:00
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-md-12 col-sm-12">
                        <div class="dropdown pl-xl-5">
                            <button class="button-language" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{(App::getLocale())}}
                                <img src="{{asset('images/down-arrow.svg')}}">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach(config('translatable.locales') as $locale)
                                    <a class="dropdown-item" href="{{$locale}}">{{strtoupper($locale)}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-xl navbar-light">
                            <div id="all-pages" class="navbar-collapse collapse order-3">
                                <ul class="navbar-nav bottom-link ">
                                    <li class="nav-item">
                                        <a class="{{Request::is('/') ? "bottom-link-activ" : ""}}" href="#">
                                            Main
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('/news') ? "bottom-link-activ" : ""}}" href="{{route('public.news.index')}}">
                                            News
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('') ? "bottom-link-activ" : ""}}" href="#">
                                            Paulownia
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('') ? "bottom-link-activ" : ""}}" href="#">
                                            Goods
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('') ? "bottom-link-activ" : ""}}" href="#">
                                            Profitability calculation
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('/galleries') ? "bottom-link-activ" : ""}}" href="{{route('public.galleries.index')}}">
                                            Gallery
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('') ? "bottom-link-activ" : ""}}" href="#">
                                            FAQ
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('/about-us') ? "bottom-link-activ" : ""}}" href="{{route('public.about-us.index')}}">
                                            About us
                                        </a>
                                    </li>
                                    <li class="nav-item ml-xl-5">
                                        <a class="{{Request::is('') ? "bottom-link-activ" : ""}}" href="#">
                                            Contacts
                                        </a>
                                    </li>
                                </ul>
                                <ul class="list-inline pl-xl-5">
                                    <li class="list-inline-item ml-xl-5">
                                        <img src="{{asset('images/line.svg')}}">
                                    </li>
                                    <li class="list-inline-item ml-3">
                                        <a href="#"><img src="{{asset('images/user.svg')}}"></a>
                                    </li>
                                    <li class="list-inline-item ml-3">
                                        <a href="#"><img src="{{asset('images/shopping-cart.svg')}}"></a>
                                    </li>
                                    <li class="list-inline-item ml-3">
                                        <a href="#"><img src="{{asset('images/favorite-heart-button.svg')}}"></a>
                                    </li>
                                </ul>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#all-pages" aria-controls="all-pages" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
