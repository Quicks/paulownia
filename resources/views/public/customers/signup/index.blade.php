@extends('layouts.public')

@section('content')

<section>
    <div class="container">
    	<div class="row">
        	<div class="col-md-6 mb-4 mb-md-0 margin-auto">
            	<div class="heading_s2">
                	<h3>Регистрация</h3>
                </div>
            	<form method="POST" action="{{ route('customer.register.create') }}" class='login_form'>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="first_name">{{ __('shop::app.customer.signup-form.firstname') }}</label>
                        <input type="text" class="form-control" name="first_name" validate="'required'" value="{{ old('first_name') }}">
                    </div>
            
                    <div class="form-group">
                        <label for="last_name" >{{ __('shop::app.customer.signup-form.lastname') }}</label>
                        <input type="text" class="form-control" name="last_name" v-validate="'required'" value="{{ old('last_name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('shop::app.customer.signup-form.email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('shop::app.customer.signup-form.password') }}</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default" name="login" value="Log in">Зарегистрироватся</button>
                    </div>
                    <div class="login_footer">
                        <div class="sign-up-text">
                            Уже есть аккаунт? <a href="{{ route('customer.session.index') }}">Залогинся</a>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection


