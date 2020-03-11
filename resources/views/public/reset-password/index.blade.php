@extends('layouts.public')

@section('content')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="login-text text-reset-password">{{ __('shop::app.customer.reset-password.title') }}</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('customer.reset-password.store') }}" >
                        {{ csrf_field() }}
                        <div class="login-form">

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="control-group @if($errors->has('email')) has-error @endif">
                                <label for="email " class="first-last-name-modal">{{ __('shop::app.customer.reset-password.email') }} </label>:*
                                <input type="text" required class="control" id="email" name="email" value="{{ old('email') }}"/>
                                <span class="control-error" v-if="errors.has('email')">{{ $errors->first('email') }}</span>
                            </div>

                            <div class="control-group @if($errors->has('password')) has-error @endif">
                                <label for="password " class="first-last-name-modal">{{ __('shop::app.customer.reset-password.password') }}</label>:*
                                <input type="password" class="control" name="password" required  minlength="6" ref="password" id="password-input" >
                                <button type="button" class="position-absolute eye" onclick="return show_hide_password(this);"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                                <span class="control-error">{{ $errors->first('password') }}</span>
                            </div>

                            <div class="control-group mb-5 @if($errors->has('confirm_password')) has-error @endif">
                                <label for="confirm_password " class="first-last-name-modal">{{ __('shop::app.customer.reset-password.confirm-password') }}</label>:*
                                <input type="password" class="control" name="password_confirmation"  required minlength="6" id="password-input-control">
                                <button type="button" class="position-absolute eye" onclick="return show_hide_password_control(this);"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                                <span class="control-error">{{ $errors->first('confirm_password') }}</span>
                            </div>

                            <button class="button-modal-login" type="submit" value="{{ __('shop::app.customer.reset-password.submit-btn-title') }}">Reset Password</button>

                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
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