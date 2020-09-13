@extends('layouts.public')

@section('content')
    @include('public.breadcrumbs', [
        $breadcrumbs = [
        ],
        $pageTitle = 'header-footer.account'
    ])

<section>
    <div class="container">
    	<div class="row">
        	<div class="col-md-6 mb-4 mb-md-0 margin-auto">
            	<div class="heading_s2">
                	<h3>Login</h3>
                </div>
            	<form method="POST" action="{{ route('customer.session.create') }}" class='login_form'>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Username or email <span class="required">*</span></label>
                        <input type="text" required class="form-control" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label>Password <span class="required">*</span></label>
                        <input class="form-control" required type="password" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default" name="login" value="Log in">Log in</button>
                    </div>
                    <div class="login_footer">
                        <div class="sign-up-text">
                            {{ __('shop::app.customer.login-text.no_account') }} - <a href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.title') }}</a>
                        </div>
                        <a href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>
                        <label>
                            <input name="rememberme" type="checkbox" value="forever"> <span>Remember me</span>
                        </label>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection
