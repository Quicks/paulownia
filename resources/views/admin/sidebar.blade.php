<div class="col-md-2">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav flex-column nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('admin/welcome*') ? "active" : ""}}" href="{{ url('/admin') }}">
                        Welcome
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard.index')}}">Shop</a></li>
                <li class="nav-item"><a class="nav-link {{Request::is('admin/news*') ? "active" : ""}}" href="{{route('news.index')}}">News</a></li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('admin/galleries*') ? "active" : ""}}" href="{{route('galleries.index')}}">
                        Galleries
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('admin/treatises*') ? "active" : ""}}" href="{{route('treatises.index')}}">
                        Treatises
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('admin/offices*') ? "active" : ""}}" href="{{route('offices.index')}}">
                        Official Offices
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('stats*') ? "active" : ""}}" href="{{route('tracker.stats.index')}}">
                        Tracking statistics
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>