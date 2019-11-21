<div class="custom-admin-sidebar">
    <ul>
        @if(bouncer()->hasPermission('welcome'))
            <li>
                <a class="{{Request::is('admin/welcome*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{ url('/admin/welcome') }}">
                    <i class="fa fa-home fa-2x"></i><p>Welcome</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('news'))
            <li>
                <a class="{{Request::is('admin/news*') || Request::is('admin/articles*') || Request::is('admin/treatises*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('news.index')}}">
                    <i class="fa fa-newspaper-o fa-2x"></i><p>News</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('galleries'))
            <li>
                <a class="{{Request::is('admin/galleries*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('galleries.index')}}">
                    <i class="fa fa-picture-o fa-2x"></i><p>Galleries</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('images'))
            <li>
                <a class="{{Request::is('admin/images*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('images.index')}}">
                    <i class="fa fa-camera-retro fa-2x"></i><p>Images</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('offices'))
            <li>
                <a class="{{Request::is('admin/offices*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('offices.index')}}">
                    <i class="fa fa-university fa-2x"></i><p>Official Offices</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('partners'))
            <li>
                <a class="{{Request::is('admin/partners*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('partners.index')}}">
                    <i class="fa fa-user-plus fa-2x"></i><p>Partners</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('dashboard'))
            <li>
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="menu-properties icon dashboard-icon"></i>
                        <p>Dashboard</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('sales.orders'))
            <li>
                <a href="{{route('admin.sales.orders.index')}}">
                    <i class="menu-properties icon sales-icon"></i>
                        <p>Sales</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('catalog.products'))
            <li>
                <a href="{{route('admin.catalog.products.index')}}">
                    <i class="menu-properties icon catalog-icon"></i>
                        <p>Catalog</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('customers'))
            <li>
                <a href="{{route('admin.customer.index')}}">
                    <i class="menu-properties icon customer-icon"></i>
                    <p>Customers</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('cart-rule'))
            <li>
                <a href="{{route('admin.cart-rule.index')}}">
                    <i class="menu-properties icon promotions-icon"></i>
                    <p>Promotions</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('locales'))
            <li>
                <a href="{{route('admin.locales.index')}}">
                    <i class="menu-properties icon settings-icon"></i>
                    <p>Settings</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('configuration'))
            <li>
                <a href="{{route('admin.configuration.index')}}">
                    <i class="menu-properties icon configuration-icon"></i>
                    <p>Configure</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('certificates'))
            <li>
                <a class="{{Request::is('admin/certificates*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('certificates.index')}}">
                    <i class="fa fa-certificate fa-2x"></i><p>Certificates</p>
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('tracking'))
            <li>
                <a class="{{Request::is('stats*') ? "custom-admin-sidebar-a-active" : ""}}"
                   href="{{route('tracker.stats.index')}}">
                    <i class="fa fa-line-chart fa-2x"></i><p>Tracking statistics</p>
                </a>
            </li>
        @endif
    </ul>
</div>
