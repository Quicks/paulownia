
<div id="page-sidebar">
    <div class="scroll-sidebar">
        

    <ul id="sidebar-menu">
        <li class="header"><span>Welcome</span></li>

        @if(bouncer()->hasPermission('welcome'))
            <li>
                <a class="{{Request::is('admin/welcome*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{ url('/admin/welcome') }}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Welcome</span>
                </a>
            </li>
        @endif
        <li class="divider"></li>

        <li class="header"><span>Public</span></li>

        <li>
            @if(bouncer()->hasPermission('news'))
                <a href="#" title="Elements">
                    <i class="glyph-icon icon-linecons-diamond"></i>
                    <span>News</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{route('news.index')}}" title="News"><span>News</span></a></li>
                        <li><a href="{{route('articles.index')}}" title="Articles"><span>Articulo</span></a></li>
                        <li><a href="{{route('treatises.index')}}" title="treatises"><span>treatises</span></a></li>
                    </ul>
                </div>
            @endif
        </li>
        @if(bouncer()->hasPermission('contents'))
            <li>
                <a href="#" title="Elements">
                <i class="glyph-icon icon-linecons-diamond"></i>
                    <span>Contents</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="{{route('contents.index')}}" title="content editor"><span>Content editor</span></a></li>
                        <li><a href="{{route('f-a-q.index')}}" title="Faq"><span>Faq</span></a></li>
                    </ul>

                </div>
            </li>

            
        @endif
        
        @if(bouncer()->hasPermission('galleries'))
            <li>
                <a class="{{Request::is('admin/galleries*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('galleries.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Galleries</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('partners'))
            <li>
                <a class="{{Request::is('admin/partners*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('partners.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Partners</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('images'))
            <li>
                <a class="{{Request::is('admin/images*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('images.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Images</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('offices'))
            <li>
                <a class="{{Request::is('admin/offices*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('offices.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Official Offices</span>
                </a>
            </li>
        @endif
        <li class="divider"></li>

        <li class="header"><span>Shop</span></li>
        @if(bouncer()->hasPermission('dashboard'))
            <li>
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('sales.orders'))
            <li>
                <a href="{{route('admin.sales.orders.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Sales</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('catalog.products'))
            <li>
                <a href="{{route('admin.catalog.products.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Catalog</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('customers'))
            <li>
                <a href="{{route('admin.customer.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Customers</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('cart-rule'))
            <li>
                <a href="{{route('admin.cart-rule.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Promotions</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('locales'))
            <li>
                <a href="{{route('admin.locales.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Settings</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('configuration'))
            <li>
                <a href="{{route('admin.configuration.index')}}">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Configure</span>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('certificates'))
            <li>
                <a class="{{Request::is('admin/certificates*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('certificates.index')}}">
                   <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Certificates</span>
                </a>
            </li>
        @endif
        <li class="divider"></li>

        <li class="header"><span>Tracking</span></li>

        @if(bouncer()->hasPermission('tracking'))
            <li>
                <a class="{{Request::is('stats*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('tracker.stats.index')}}">
                   <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Tracking statistics</span>
                </a>
            </li>
        @endif


    </ul><!-- #sidebar-menu -->


    </div>
</div>