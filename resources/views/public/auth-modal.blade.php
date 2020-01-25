<div class="modal fade" id="AuthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="sign-tab" data-toggle="tab" href="#sign" кole="tab"
                             aria-controls="sign" aria-selected="true">
                            Sign Up
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="log-tab" data-toggle="tab" href="#log" role="tab" 
                                aria-controls="log" aria-selected="false">
                            Login
                        </a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img data-src="/images/button-close-modal.png" class="lazyload"></span>
                </button>
            </div>

            <div class="modal-body p-0">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sign" role="tabpanel" aria-labelledby="sign-tab">
                        <form method="post" action="{{ route('customer.register.create') }}">
                            {{ csrf_field() }}
                            <div class="login-form mt-4">
                                <div class="control-group @if($errors->has('first_name')) has-error @endif">
                                    <label for="first_name" class="required first-last-name-modal">{{ __('shop::app.customer.signup-form.firstname') }}</label>:*
                                    <input type="text" class="control" name="first_name" required value="{{ old('first_name') }}">
                                    <span class="control-error">{{ $errors->first('first_name') }}</span>
                                </div>

                                <div class="control-group @if($errors->has('last_name')) has-error @endif">
                                    <label for="last_name" class="required first-last-name-modal">{{ __('shop::app.customer.signup-form.lastname') }}</label>:*
                                    <input type="text" class="control" name="last_name" required value="{{ old('last_name') }}">
                                    <span class="control-error">{{ $errors->first('last_name') }}</span>
                                </div>

                                <div class="control-group @if($errors->has('email')) has-error @endif">
                                    <label for="email" class="required width-email-sing-in">{{ __('shop::app.customer.signup-form.email') }}</label>:*
                                    <input type="email" class="control " name="email" required value="{{ old('email') }}">
                                    <span class="control-error">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="control-group @if($errors->has('password')) has-error @endif">
                                    <label for="password" class="required width-password-sing-in">{{ __('shop::app.customer.signup-form.password') }}</label>:*
                                    <input type="password" class="control-password" name="password" required minlength="6" value="{{ old('password') }}">
                                    <span class="control-error">{{ $errors->first('password') }}</span>
                                </div>

                                <div class="control-group mb-4 @if($errors->has('password_confirmation')) has-error @endif">
                                    <label for="password_confirmation" class="required width-password-confirmation">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>:*
                                    <input type="password" class="control-password" name="password_confirmation"  required minlength="6">
                                    <span class="control-error">{{ $errors->first('password_confirmation') }}</span>
                                </div>

                                <button class="button-modal-login" type="submit">
                                    {{ __('shop::app.customer.signup-form.button_title') }}
                                </button>

                                <div class="modal-footer">

                                </div>
                            </div>
                        </form>
                        
                    </div>

                    <div class="tab-pane fade" id="log" role="tabpanel" aria-labelledby="log-tab">
                        <form method="POST" action="{{ route('customer.session.create') }}">
                            {{ csrf_field() }}
                            <div class="login-form p-3 ">
                                <div class="control-group mb-3 @if($errors->has('email')) has-error @endif">
                                    <label for="email" class="required width-email">{{ __('shop::app.customer.login-form.email') }}</label>:*
                                    <input type="email" class="control" name="email" required value="{{ old('email') }}">
                                    <span class="control-error">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="control-group mb-3 @if($errors->has('password')) has-error @endif">
                                    <label for="password" class="required width-password">{{ __('shop::app.customer.login-form.password') }}</label>:*
                                    <input type="password" class="control-password" name="password" required value="{{ old('password') }}" minlength="6">
                                    <span class="control-error">{{ $errors->first('password') }}</span>

                                </div>

                                <div class="forgot-password-link pt-3">
                                    <a href="{{ route('customer.forgot-password.create') }}" class="pl-3 href-forgot">
                                        {{ __('shop::app.customer.login-form.forgot_pass') }}
                                    </a><img data-src="/images/square-for-modal.png" class="lazyload">

                                    <div class="mt-10">
                                        @if (Cookie::has('enable-resend'))
                                            @if (Cookie::get('enable-resend') == true)
                                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <input class="button-modal-sing-in" type="submit"
                                   value="{{ __('shop::app.customer.login-form.button_title') }}">

                            <div class="modal-footer p-0">

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        if( $('.has-error').length) {
            $('#AuthModal').modal('show');
        };
        if({{old('first_name') ? 'true' : 'false'}}) {
            $('#sign-tab').tab('show');
        } else {
            $('#log-tab').tab('show');
        }
    });
</script>
@endpush
