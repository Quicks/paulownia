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
                Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum
            </div>
            <img class="message-close" src="{{asset('/images/close.svg')}}" alt="">
        </div>
        <div class="nav-bar-wrap">
            <div class="nav-bar-menu">
                <nav class="navbar navbar-expand-lg" style="align-items: center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @foreach($menus as $menu)
                                @if(count($menu->children))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle menu-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$menu->title}}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach($menu->children as $child)
                                                @if(count($child->children))
                                                    <ul class="nav-item dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownSubmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{$child->title}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownSubmenu">
                                                            @foreach($child->children as $subchild)
                                                                <a class="dropdown-item" href="/{{$current_locale.$subchild->link}}">{{$subchild->title}}</a>
                                                            @endforeach
                                                        </div>
                                                    </ul>
                                                @else
                                                    <a class="dropdown-item" href="/{{$current_locale.$child->link}}">{{$child->title}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="menu-link {{Request::getPathInfo() == $menu->link ? 'active' : ''}}" href="/{{$current_locale.$menu->link}}">{{$menu->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="nav-bar-panel">
                <div class="panel-item">
                    <img src="{{asset("images/search.svg")}}" alt="search">
                    <div class="panel-item-name desktop">&nbsp;</div>
                </div>
                <div class="panel-item">
                    <a href="#"><img src="{{asset("images/heart-white.svg")}}" alt="favorite"></a>
                    <div class="panel-item-name desktop">
                        <a href=''>Wishlist</a>
                    
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav attr-nav align-items-center"> 
                        <li class="dropdown cart_wrap">
                            <a class="nav-link panel-item" href="#" data-toggle="dropdown">
                                <img src="{{asset("images/bag.svg")}}" alt="cart">
                                <div class="count-bg">
                                    <span>
                                        @if(Webkul\Checkout\Facades\Cart::getCart())
                                            {{Webkul\Checkout\Facades\Cart::getCart()->items_count}}
                                    @endif
                                    </span>
                                </div>
                                <div class="panel-item-name desktop">Basket</div>
                            </a>
                            <div class="cart_box dropdown-menu dropdown-menu-right round-corners" id='cart-header-preview'>
                                @include('public.cart.cart_preview')
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- <div class="panel-item position-relative">
                    <img src="{{asset("images/bag.svg")}}" alt="cart">
                    <div class="count-bg">
                        <span>2</span>
                    </div>
                    <div class="panel-item-name desktop">Basket</div>
                </div> -->
                <div class="panel-item">
                    <img src="{{asset("images/man.svg")}}" alt="profile">
                    <div class="panel-item-name desktop">Account</div>
                </div>
                <div class="panel-item">
                    <ul class="header_list border_list list_none header_dropdown text-center text-md-right">
                        <li class="dropdown-toggle">
                            {{$current_locale}}
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contacts-wrap">
            <span><a href='mailto:info@paulownia.pro'>info@paulownia.pro</a></span>
            <span> <a href='phone:+34 642 787 555'>+34 642 787 555</a></span>
        </div>
        <div class="header-write-us desktop">Напишите нам</div>
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
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .nav-bar-wrap .navbar-toggler {
        background: none;
        margin: 0;
        box-shadow: none;
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
    .panel-item .dropdown-toggle {
        text-transform: uppercase;
        color: white;
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

    @media (min-width: 1024px) {
        .header-wrap .mobile {
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
            cursor: pointer;
        }
        .nav-bar-wrap {
            padding: 0 25px 0 295px;
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
            margin-right: 20px;
            display: flex;
            align-items: center;
        }
        #navbarSupportedContent > ul {
            align-items: center;
        }
        #navbarDropdown{
            text-transform: uppercase;
        }
        #navbarSupportedContent > ul > li.nav-item.dropdown > div {
            /*width: 260px;*/
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.25);
            border-radius: 30px 0 0 0;
            margin-top: -30px;
            padding: 10px
        }
        #navbarSupportedContent > ul > li.nav-item.dropdown > div > a,
        #navbarDropdownSubmenu {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            line-height: 22px;
            color: #575756;
        }
        #navbarSupportedContent > ul > li.nav-item.dropdown > div > ul > div {
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.25);
            border-radius: 0 0 30px 0;
            margin-top: -46px;
            margin-left: 10px;
            padding: 10px
        }
        #navbarSupportedContent > ul > li.nav-item.dropdown > div > ul > div > a {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            line-height: 22px;
            color: #575756;
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
            margin-left: 12px;
        }
        .panel-item .dropdown-menu {
            min-width: 4rem;
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
            font-size: 14px;
            line-height: 20px;
            padding-right: 30px;
            margin-top: 10px;
        }
        .contacts-wrap > span {
            margin-left: 10px;

        }
        .header-write-us {
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
            margin: 2px 25px 0;
        }
    }

    @media (min-width: 1440px) {
        .nav-bar-wrap {
            margin-top: 15px;
        }
        .contacts-wrap {
            margin-top: 20px;
            font-size: 18px;
            line-height: 20px;
        }
        .header-write-us {
            margin-top: 20px;
        }
    }
    @media (min-width: 1920px) {
        .nav-bar-wrap {
            margin-top: 30px;
        }
    }
</style>
