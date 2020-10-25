<!-- START HEADER -->
<header>
    <div class="header-wrap">
        <img class="mobile" src="{{asset('/images/header-bg-mobile.svg')}}" alt="">
        <img class="desktop" src="{{asset('/images/header-bg-desktop.svg')}}" alt="">
        <a href="/">
            <img class="header-logo-bg mobile" src="{{asset("images/header-logo-ellipse-mobile.svg")}}" alt="">
            <img class="header-logo-bg desktop" src="{{asset("images/header-logo-ellipse-desktop.svg")}}" alt="">
            <img class="header-logo" src="{{asset("images/header-logo.svg")}}" alt="">
        </a>
        <div class="header-message-wrap desktop">
            <div class="message-text">
                Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site about Lorem Ipsum, giving information on its origins, as
            </div>
            <img class="message-close" src="{{asset('/images/close.svg')}}" alt="">
        </div>
        <div class="nav-bar-wrap">
            <div class="nav-bar-burger-menu mobile">
                <img src="{{asset("images/burger.svg")}}" alt="menu">
            </div>
            <div class="nav-bar-menu desktop">
                @foreach($menus as $menu)
                    @if(count($menu->children))
                        <div class="submenu menu-link">
                            <a class="menu-link-after" href="#">{{ $menu->title }}</a>
                            <img src="{{asset("images/burger.svg")}}" alt="menu">
{{--                            <div class="burger-menu">--}}
{{--                                @foreach($menu->children as $menu_child)--}}
{{--                                    @if(count($menu_child->children))--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ $menu_child->title }}</a>--}}
{{--                                            <div class="dropdown-menu">--}}
{{--                                                @foreach($menu_child->children as $sub_child)--}}
{{--                                                    <a class="dropdown-item nav-link nav_item"--}}
{{--                                                       href="/{{$current_locale.'/'.$sub_child->link}}">--}}
{{--                                                        {{$sub_child->title}}--}}
{{--                                                    </a>--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <a class="dropdown-item nav-link nav_item" href="/{{$current_locale.'/'.$menu_child->link}}">{{$menu_child->title}}</a>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                        </div>
                    @else
                        <a class="menu-link {{Request::getPathInfo() == $menu->link ? 'active' : ''}}" href="/{{$current_locale.$menu->link}}">{{$menu->title}}</a>
                    @endif
                @endforeach
            </div>
            <div class="nav-bar-panel">
                <div class="panel-item">
                    <img src="{{asset("images/search.svg")}}" alt="search">
                    <div class="panel-item-name desktop">&nbsp;</div>
                </div>
                <div class="panel-item">
                    <img src="{{asset("images/heart.svg")}}" alt="favorite">
                    <div class="panel-item-name desktop">Wishlist</div>
                </div>
                <div class="panel-item position-relative">
                    <img src="{{asset("images/bag.svg")}}" alt="cart">
                    <div class="count-bg">
                        <span>2</span>
                    </div>
                    <div class="panel-item-name desktop">Basket</div>
                </div>
                <div class="panel-item">
                    <img src="{{asset("images/man.svg")}}" alt="profile">
                    <div class="panel-item-name desktop">My Account</div>
                </div>
                <div class="panel-item position-relative">
                    <div class="selected-lang">{{$current_locale}}</div>
                    <img class="position-absolute" src="{{asset("images/chevron-down.svg")}}" alt="language switcher">
                    <div class="panel-item-name desktop">&nbsp;</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach(config('translatable.locales') as $locale)
                            <a class="dropdown-item"
                                @if(App::getLocale() != Request::segment(1))
                                    href="{{url($locale. '/' . Request::path())}}"
                                @else
                                    href="{{Request::root() .'/'. $locale . substr(Request::path(), 2)}}"
                                @endif
                            >
                                {{$locale}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="contacts-wrap">
            <span>info@paulownia.pro</span>
            <span> +34 642 787 555</span>
        </div>
        <div class="write-us desktop">Напишите нам</div>
    </div>

</header>
<!-- END HEADER -->
<style>
    .header-wrap {
        position: relative;
        width: 100%;
        z-index: 2;
    }
    .header-wrap > img {
        position: absolute;
        width: 100%;
        z-index: -1;
    }
    .desktop {
       display: none;
    }
    .header-logo-bg {
        position: absolute;
        top: 0;
        left: 45px;
    }
    .header-logo {
        width: 78px;
        position: absolute;
        top: 0;
        left: 52px;
    }
    .nav-bar-wrap {
        height: 35px;
        padding: 0 20px 0 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .nav-bar-burger-menu {
        cursor: pointer;
    }
    .nav-bar-panel {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .panel-item {
        display: flex;
        align-items: center;
        margin-right: 12px;
        cursor: pointer;
    }
    .panel-item:last-child {
        margin-right: 0;
    }
    .panel-item .position-absolute {
        top: 10px;
        left: 22px;
    }
    .count-bg {
        position: absolute;
        width: 14px;
        height: 14px;
        background-color: white;
        border-radius: 50%;
        bottom: -3px;
        right: -5px;
    }
    .count-bg > span {
        position: absolute;
        /*font-family: Kontora;*/
        font-family: 'Poppins', sans-serif;
        font-size: 10px;
        line-height: 10px;
        color: #5B9600;
        bottom: 1px;
        right: 4px;
    }
    .selected-lang {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        line-height: 21px;
        text-transform: uppercase;
        color: white;
        margin-right: 3px;
        margin-top: 3px;
    }
    .contacts-wrap {
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        line-height: 21px;
        letter-spacing: -0.04em;
        color: #FDFDFD;
        text-align: right;
        padding-right: 10px;
        margin-top: 10px;
    }

    @media (min-width: 1440px) {
        .mobile {
            display: none;
        }
        .header-wrap .desktop {
            display: flex;
        }
        .nav-bar-burger-menu {
            display: none;
        }
        .header-logo-bg {
            left: 55px;
        }
        .header-logo {
            width: 188px;
            position: absolute;
            top: 0;
            left: 70px;
        }
        .header-message-wrap {
            padding:3px 135px 0 295px;
            display: flex;
            align-items: center;
            justify-content: start;

        }
        .message-text {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            line-height: 18px;
            letter-spacing: -0.04em;
            color: #FDFDFD;
        }
        .message-close {
           margin-left: 15px;
        }
        .nav-bar-wrap {
            padding: 15px 146px 0 295px;
            justify-content: space-between;
        }
        .nav-bar-menu {
            display: flex;
            align-items: center;
            justify-content: start;

        }
        .menu-link {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            line-height: 21px;
            text-transform: uppercase;
            color: white;
            margin-right: 35px;
            display: flex;
            align-items: center;
        }
        .menu-link-after {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            line-height: 21px;
            text-transform: uppercase;
            color: white;
        }
        .menu-link > img {
            margin-left: 5px;
            width: 16px;
            cursor:pointer;
        }
        .nav-bar-panel {
            justify-content: end;
            padding-top: 15px;
        }
        .panel-item {
            display: flex;
            flex-direction: column;
            margin-left: 25px;
        }
        .panel-item .position-absolute{
            top: 10px;
            left: 22px;
        }
        .panel-item-name {
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            line-height: 15px;
            letter-spacing: -0.04em;
            color: #FDFDFD;
        }
        .count-bg {
            bottom: 14px;
            right: 0;
        }
        .count-bg > span {
            right: 4px;
        }
        .contacts-wrap {
            flex-direction: row-reverse;
            font-size: 18px;
            line-height: 27px;
            padding-right: 135px;
            margin-top: 35px;
        }
        .contacts-wrap > span {
            margin-left: 15px;

        }
        .write-us {
            width: 134px;
            height: 32px;
            background: #5B9600;
            border-radius: 30px 0;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            line-height: 18px;
            text-align: center;
            text-transform: uppercase;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            float: right;
            margin: 10px 135px 0;
        }
    }
</style>
