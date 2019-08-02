<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/admin/welcome') }}">
            <img src="{{ asset('images/logo.png') }}" width="112px" height="41px" alt="Paulownia"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="custom-profile">
                                        <span class="user-name">
                                            {{ auth()->guard('admin')->user()->name }}
                                        </span>

                                <span class="user-role">
                                            {{ auth()->guard('admin')->user()->role['name'] }}
                                        </span>
                            </div>
                        </a>
                        <div class="dropdown-menu custom-drop-menu" aria-labelledby="navbarDropdown">
                            <label class="drop-list-label">
                                Account
                            </label>
                            <ul>
                                <li>
                                    <a href="{{ route('shop.home.index') }}"
                                       target="_blank">{{ trans('admin::app.layouts.visit-shop') }}</a>
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
    </div>
</nav>