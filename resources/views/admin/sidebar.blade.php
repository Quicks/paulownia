<div class="col-md-3">
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
            </ul>
        </div>
    </div>
</div>
