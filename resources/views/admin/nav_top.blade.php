<nav class="navbar navbar-expand-md navbar-light navbar-laravel custom-nav-bs4">
    <a class="navbar-brand custom-nav-link-bs4" href="{{ url('/admin/welcome') }}">
        <img src="{{ asset('images/logo.png') }}" width="112px" height="41px" alt="Paulownia"/>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if(!auth()->guard('admin')->check())
                <li><a class="nav-link" href="{{ url('/admin/login') }}">Login</a></li>
                <li><a class="nav-link" href="{{ url('/customer/register') }}">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="custom-profile">
                            <span class="user-name">
                                {{ auth()->guard('admin')->user()->name }}
                            </span>

                            <span class="user-role">
                                {{ auth()->guard('admin')->user()->role['name'] }}
                            </span>
                        </div>
                            <i class="fa fa-caret-down fa-lg custom-drop-down-icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu custom-drop-menu" aria-labelledby="navbarDropdown">
                        <label class="drop-list-label">
                            Account
                        </label>
                        <ul>
                            <li>
                                <a href="{{ route('main') }}" target="_blank">{{ trans('admin::app.layouts.visit-shop') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.account.edit') }}">{{ trans('admin::app.layouts.my-account') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.session.destroy') }}">{{ trans('admin::app.layouts.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>