@extends('layouts.public')

@section('content')

<div class="auth-content">
    <form method="post" action="{{ route('customer.reset-password.store') }}" >
        {{ csrf_field() }}
        <div class="login-form">

            <div class="login-text">{{ __('shop::app.customer.reset-password.title') }}</div>
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="control-group @if($errors->has('email')) has-error @endif">
                <label for="email">{{ __('shop::app.customer.reset-password.email') }}</label>
                <input type="text" required class="control" id="email" name="email" value="{{ old('email') }}"/>
                <span class="control-error" v-if="errors.has('email')">{{ $errors->first('email') }}</span>
            </div>

            <div class="control-group @if($errors->has('password')) has-error @endif">
                <label for="password">{{ __('shop::app.customer.reset-password.password') }}</label>
                <input type="password" class="control" name="password" required  minlength="6" ref="password">
                <span class="control-error">{{ $errors->first('password') }}</span>
            </div>

            <div class="control-group @if($errors->has('confirm_password')) has-error @endif">
                <label for="confirm_password">{{ __('shop::app.customer.reset-password.confirm-password') }}</label>
                <input type="password" class="control" name="password_confirmation"  required minlength="6">
                <span class="control-error">{{ $errors->first('confirm_password') }}</span>
            </div>
            <input class="btn btn-primary btn-lg" type="submit" value="{{ __('shop::app.customer.reset-password.submit-btn-title') }}">

        </div>
    </form>
</div>
@endsection