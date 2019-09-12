<div class="custom-admin-sidebar">
    <ul>
        <li>
            <a class="{{Request::is('admin/welcome*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{ url('/admin/welcome') }}">
                <i class="fa fa-home fa-3x"></i><span>Welcome</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.dashboard.index')}}"><i class="fa fa-shopping-cart fa-3x"></i><span>Shop</span></a>
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
            <a class="{{Request::is('stats*') ? "custom-admin-sidebar-a-active" : ""}}"
               href="{{route('tracker.stats.index')}}">
                <i class="fa fa-line-chart fa-3x"></i><span>Tracking statistics</span>
            </a>
        </li>
    </ul>
</div>
