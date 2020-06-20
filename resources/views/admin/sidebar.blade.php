
<div id="page-sidebar">
    <div class="scroll-sidebar">
    
    <ul id="sidebar-menu">
        <li class="header"><span>@lang('admin.sidebar.links.dashboard')</span></li>

        @if(bouncer()->hasPermission('welcome'))
            <li>
                <a class="{{Request::is('admin/welcome*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{ url('/admin/welcome') }}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.dashboard')</span>
                </a>
            </li>
        @endif
        <li class="divider"></li>

        <li class="header"><span>@lang('admin.sidebar.links.public.title')</span></li>

        <li>
            @if(bouncer()->hasPermission('news'))
                <a href="#" title="Elements">
                    <i class="glyph-icon icon-linecons-diamond"></i>
                    <span>@lang('admin.sidebar.links.public.news.title')</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{route('news.index')}}" title="News"><span>@lang('admin.sidebar.links.public.news.news')</span></a></li>
                        <li><a href="{{route('articles.index')}}" title="Articles"><span>@lang('admin.sidebar.links.public.news.articles')</span></a></li>
                        <li><a href="{{route('treatises.index')}}" title="treatises"><span>@lang('admin.sidebar.links.public.news.treatises')</span></a></li>
                    </ul>
                </div>
            @endif
        </li>
        @if(bouncer()->hasPermission('contents'))
            <li>
                <a href="#" title="Elements">
                <i class="glyph-icon icon-linecons-diamond"></i>
                    <span>@lang('admin.sidebar.links.public.contents.title')</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <!-- <li><a href="{{route('contents.index')}}" title="content editor"><span>@lang('admin.sidebar.links.public.contents.content_editor')</span></a></li> -->
                        <li>
                            <a href="{{route('f-a-q.index')}}" title="Faq">
                                <span>@lang('admin.sidebar.links.public.contents.faq')</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('admin/galleries') ? "custom-admin-sidebar-a-active" : ""}}"
                            href="{{route('galleries.index')}}">
                                <span>@lang('admin.sidebar.links.public.gallery')</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('admin/our-services') ? "custom-admin-sidebar-a-active" : ""}}"
                            href="{{route('our-service.index')}}">
                                <span>@lang('admin.sidebar.links.public.our_service')</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('admin/slider') ? "custom-admin-sidebar-a-active" : ""}}"
                            href="{{route('slider.index')}}">
                                <span>@lang('admin.sidebar.links.public.slider')</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('admin/menus') ? "custom-admin-sidebar-a-active" : ""}}"
                            href="{{route('menus.index')}}">
                                <span>@lang('admin.sidebar.links.public.menus')</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </li>

            
        @endif
        @if(bouncer()->hasPermission('partners'))
            <li>
                <a class="{{Request::is('admin/partners*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('partners.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.public.partners')</span>
                </a>
            </li>
        @endif
        <!-- @if(bouncer()->hasPermission('images'))
            <li>
                <a class="{{Request::is('admin/images*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('images.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.public.images')</span>
                </a>
            </li>
        @endif -->
        @if(bouncer()->hasPermission('offices'))
            <li>
                <a class="{{Request::is('admin/offices*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('offices.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.public.official_offices')</span>
                </a>
            </li>
        @endif
        <li class="divider"></li>

        <li class="header"><span>@lang('admin.sidebar.links.shop.title')</span></li>
        @if(bouncer()->hasPermission('dashboard'))
            <li>
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.shop.dashboard')</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('sales.orders'))
            <li>
                <a href="{{route('admin.sales.orders.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.shop.sales')</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('catalog.products'))
            <li>
                <a href="#" title="Elements">
                <i class="glyph-icon icon-linecons-diamond"></i>
                    <span>@lang('admin.sidebar.links.shop.catalog')</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li>
                            <a href="{{route('products.index')}}">
                                <span>@lang('admin.sidebar.links.shop.products')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orders.index')}}">
                                <span>@lang('admin.sidebar.links.shop.orders')</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a class="{{Request::is('admin/categories') ? "custom-admin-sidebar-a-active" : ""}}"
                            href="{{route('admin.catalog.categories.index')}}">
                                <span>@lang('admin.sidebar.links.shop.categories')</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::is('admin/attributes') ? "custom-admin-sidebar-a-active" : ""}}"
                            href="{{route('admin.catalog.attributes.index')}}">
                                <span>@lang('admin.sidebar.links.shop.attributes')</span>
                            </a>
                        </li> -->
                    </ul>

                </div>
            </li>

            
        @endif
        @if(bouncer()->hasPermission('customers'))
            <li>
                <a href="{{route('admin.customer.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.shop.customers')</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('cart-rule'))
            <li>
                <a href="{{route('admin.cart-rule.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.shop.promotions')</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('locales'))
            <li>
                <a href="#" title="Elements">
                    <i class="glyph-icon icon-linecons-diamond"></i>
                    <span>@lang('admin.sidebar.links.shop.settings')</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{route('admin.currencies.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.currencies')</span></a></li>
                        <li><a href="{{route('admin.exchange_rates.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.exchange_rates')</span></a></li>
                        <li><a href="{{route('admin.inventory_sources.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.inventory_sources')</span></a></li>
                        <li><a href="{{route('admin.channels.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.channels')</span></a></li>
                        <li><a href="{{route('admin.users.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.users')</span></a></li>
                        <li><a href="{{route('admin.sliders.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.sliders')</span></a></li>
                        <li><a href="{{route('admin.tax-categories.index')}}" title="News"><span>@lang('admin.sidebar.links.shop.tax-categories')</span></a></li>

                    </ul>
                </div>
            </li>
        @endif
        @if(bouncer()->hasPermission('configuration'))
            <li>
                <a href="{{route('admin.configuration.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.shop.configure')</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('certificates'))
            <li>
                <a class="{{Request::is('admin/certificates*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('certificates.index')}}">
                   <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.shop.certificates')</span>
                </a>
            </li>
        @endif
        <li class="divider"></li>

        <li class="header"><span>@lang('admin.sidebar.links.tracking.title')</span></li>

        @if(bouncer()->hasPermission('tracking'))
            <li>
                <a class="{{Request::is('stats*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('tracker.stats.index')}}">
                   <i class="glyph-icon icon-linecons-tv"></i>
                    <span>@lang('admin.sidebar.links.tracking.tracking_statistic')</span>
                </a>
            </li>
        @endif


    </ul>


    </div>
</div>