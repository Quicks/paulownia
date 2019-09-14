<div class="custom-admin-sidebar">
    <ul>
        <li>
            <a class="{{Request::is('admin/welcome*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{ url('/admin/welcome') }}">
                <i class="fa fa-home fa-3x"></i><span>Welcome</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.dashboard.index')}}">
                <i class="menu-properties icon dashboard-icon"></i>
                    <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a class="{{Request::is('admin/news*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{route('news.index')}}">
                <i class="fa fa-newspaper-o fa-3x"></i><span>News</span>
            </a>
        </li>
        <li>
            <a class="{{Request::is('admin/galleries*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{route('galleries.index')}}">
                <i class="fa fa-picture-o fa-3x"></i><span>Galleries</span>
            </a>
        </li>
        <li>
            <a class="{{Request::is('admin/treatises*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{route('treatises.index')}}">
                <i class="fa fa-book fa-3x"></i><span>Treatises</span>
            </a>
        </li>
        <li>
            <a class="{{Request::is('admin/offices*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{route('offices.index')}}">
                <i class="fa fa-university fa-3x"></i><span>Official Offices</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.sales.orders.index')}}">
                <i class="menu-properties icon sales-icon"></i>
                    <span>Sales</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.catalog.products.index')}}">
                <i class="menu-properties icon catalog-icon"></i>
                    <span>Catalog</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.customer.index')}}">
                <i class="menu-properties icon customer-icon"></i>
                <span>Customers</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.cart-rule.index')}}">
                <i class="menu-properties icon promotions-icon"></i>
                <span>Promotions</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.locales.index')}}">
                <i class="menu-properties icon settings-icon"></i>
                <span>Settings</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.configuration.index')}}">
                <i class="menu-properties icon configuration-icon"></i>
                <span>Configure</span>
            </a>
        </li>
        <li>
            <a class="{{Request::is('stats*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{route('tracker.stats.index')}}">
                <i class="fa fa-line-chart fa-3x"></i><span>Tracking statistics</span>
            </a>
        </li>
    </ul>
</div>
