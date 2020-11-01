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
                
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav attr-nav align-items-center"> 
                        <li>
                            <div class="panel-item wishlist">
                                <a href="#"><img src="{{asset("images/heart-white.svg")}}" alt="favorite"></a>
                                <div class="panel-item-name desktop">
                                    <a href=''>Wishlist</a>
                                
                                </div>
                            </div>
                        </li>    
                        <li class="dropdown cart_wrap panel-item">
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
                <div class="panel-item">
                    <ul class="header_list border_list list_none header_dropdown text-center">
                        <li class="dropdown-toggle account-list-btn text-center d-flex">
                        <img src="{{asset("images/man.svg")}}" alt="profile">
                        <div class="panel-item-name desktop">Account</div>
                            <div class="dropdown-menu round-corners account-list" aria-labelledby="dropdownMenuButton">
                                @if(Auth::guard('customer')->user())    
                                    <a class="dropdown-item" href="{{route('customer.profile.index')}}">
                                        @lang('profile.profile')
                                    </a>
                                    <a class="dropdown-item" href="{{route('customer.wishlist.index')}}">
                                        @lang('profile.favorite')
                                    </a>
                                    <a class="dropdown-item" href="{{route('customer.orders.index')}}">
                                        @lang('profile.story')
                                    </a>
                                    <a class="dropdown-item" href="{{route('customer.profile.index')}}">
                                        @lang('profile.calculation_profitability')
                                    </a>
                                    <a class="dropdown-item custom-page-tab active" href="{{route('customer.session.destroy')}}">
                                        @lang('profile.logout')
                                    </a>
                                @else
                                    <a class="dropdown-item authorize" href="{{route('customer.session.create')}}">
                                        @lang('profile.authorize')
                                    </a>
                                    <a class="dropdown-item register" href="{{route('customer.register.create')}}" >
                                        @lang('profile.create_btn')
                                    </a>
                                @endif                    
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-item">
                    <ul class="header_list border_list list_none header_dropdown text-center text-md-right">
                        <li class="dropdown-toggle">
                            {{$current_locale}}
                            <div class="dropdown-menu round-corners language-list" aria-labelledby="dropdownMenuButton">
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

<script>
    $(document).ready(function(){
        $('.register').click(function(event){
            event.preventDefault()
            $.ajax({
                url: '/profile/register-form',
                success: function(response){
                    $.magnificPopup.open({
                        items: {
                            src: response,
                            type: 'inline'
                        },
                    });
                }
            })
        })
        $('.authorize').click(function(event){
            event.preventDefault()
            $.ajax({
                url: '/profile/login-form',
                success: function(response){
                    $.magnificPopup.open({
                        items: {
                            src: response,
                            type: 'inline'
                        },
                    });
                }
            })

        })
    })
</script>