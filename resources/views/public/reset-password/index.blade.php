@extends('layouts.public')

@section('content')

    <div class="row">
    <div class="text-reset-password col-12">{{ __('shop::app.customer.reset-password.title') }}</div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('customer.reset-password.store') }}" >
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="control-group @if($errors->has('email')) has-error @endif">
                    <label for="email " class="first-last-name-modal-reset">{{ __('shop::app.customer.reset-password.email') }} </label>:*
                    <input type="text" required class="control-reset" id="email" name="email" value="{{ old('email') }}"/>
                    <span class="control-error" v-if="errors.has('email')">{{ $errors->first('email') }}</span>
                </div>

                <div class="control-group @if($errors->has('password')) has-error @endif">
                    <label for="password " class="first-last-name-modal-reset">{{ __('shop::app.customer.reset-password.password') }}</label>:*
                    <input type="password" class="control-reset" name="password" required  minlength="6" ref="password" id="password-input" >
                    <button type="button" class="position-absolute eye-resert" onclick="return show_hide_password(this);"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                    <span class="control-error">{{ $errors->first('password') }}</span>
                </div>

                <div class="control-group mb-5 @if($errors->has('confirm_password')) has-error @endif">
                    <label for="confirm_password " class="first-last-name-modal-reset">{{ __('shop::app.customer.reset-password.confirm-password') }}</label>:*
                    <input type="password" class="control-reset" name="password_confirmation"  required minlength="6" id="password-input-control">
                    <button type="button" class="position-absolute eye-resert" onclick="return show_hide_password_control(this);"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                    <span class="control-error">{{ $errors->first('confirm_password') }}</span>
                </div>

                <button class="reset-button mb-5" type="submit" value="{{ __('shop::app.customer.reset-password.submit-btn-title') }}">Reset Password</button>
            </form>

        </div>
    </div>





    @push('scripts')
        <script>
            function show_hide_password(target){
                var input = document.getElementById('password-input');
                if (input.getAttribute('type') == 'password') {
                    target.classList.add('view');
                    input.setAttribute('type', 'text');
                } else {
                    target.classList.remove('view');
                    input.setAttribute('type', 'password');
                }
                return false;
            }

            function show_hide_password_control(target){
                var input = document.getElementById('password-input-control');
                if (input.getAttribute('type') == 'password') {
                    target.classList.add('view');
                    input.setAttribute('type', 'text');
                } else {
                    target.classList.remove('view');
                    input.setAttribute('type', 'password');
                }
                return false;
            }
        </script>
    @endpush

@endsection