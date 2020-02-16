<div class="modal fade" id="AuthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link color-link active" id="sign-tab" data-toggle="tab" href="#sign" role="tab"
                             aria-controls="sign" aria-selected="true">
                            Sign Up
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-link " id="log-tab" data-toggle="tab" href="#log" role="tab"
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
                                <div class="control-group @if($errors->has('first_name')) has-auth-error @endif">
                                    <label for="first_name" class="required first-last-name-modal">{{ __('shop::app.customer.signup-form.firstname') }}</label>:*
                                    <input type="text" class="control" name="first_name" required value="{{ old('first_name') }}">
                                    <span class="control-error">{{ $errors->first('first_name') }}</span>
                                </div>

                                <div class="control-group @if($errors->has('last_name')) has-auth-error @endif">
                                    <label for="last_name" class="required first-last-name-modal">{{ __('shop::app.customer.signup-form.lastname') }}</label>:*
                                    <input type="text" class="control" name="last_name" required value="{{ old('last_name') }}">
                                    <span class="control-error">{{ $errors->first('last_name') }}</span>
                                </div>

                                <div class="control-group @if($errors->has('email')) has-auth-error @endif">
                                    <label for="email" class="required width-email-sing-in">{{ __('shop::app.customer.signup-form.email') }}</label>:*
                                    <input type="email" class="control " name="email" required value="{{ old('email') }}">
                                    <span class="control-error">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="position-relative control-group @if($errors->has('password')) has-auth-error @endif">
                                    <label for="password" class="required width-password-sing-in">{{ __('shop::app.customer.signup-form.password') }}</label>:*
                                    <input type="password" class="control-password" name="password" required minlength="6" value="{{ old('password') }}">
                                    <button type="button" class="position-absolute eye"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                                    <span class="control-error">{{ $errors->first('password') }}</span>
                                </div>

                                <div class="control-group mb-4 @if($errors->has('password_confirmation')) has-auth-error @endif">
                                    <label for="password_confirmation" class="required width-password-confirmation">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>:*
                                    <input type="password" class="control-password" name="password_confirmation"  required minlength="6">
                                    <button type="button" class="position-absolute eye-password"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                                    <span class="control-error">{{ $errors->first('password_confirmation') }}</span>
                                </div>

                                <div class="control-group @if($errors->has('subscribe')) has-auth-error @endif">
                                    <label for="subscribe" class="first-last-name-modal">Subscribe newsletter</label>:
                                    <input type="checkbox" class="" name="subscribe" checked>
                                    <span class="control-error">{{ $errors->first('subscribe') }}</span>
                                </div>

                                <button class="button-modal-login" type="submit">
                                    {{ __('shop::app.customer.signup-form.button_title') }}
                                </button>
                            </div>
                        </form>

                    </div>

                    <div class="tab-pane fade" id="log" role="tabpanel" aria-labelledby="log-tab">
                        <form method="POST" action="{{ route('customer.session.create') }}">
                            {{ csrf_field() }}
                            <div class="login-form p-3 ">
                                <div class="control-group mb-3 @if($errors->has('email')) has-auth-error @endif">
                                    <label for="email" class="required width-email">{{ __('shop::app.customer.login-form.email') }}</label>:*
                                    <input type="email" class="control" name="email" required value="{{ old('email') }}">
                                    <span class="control-error">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="control-group mb-3 @if($errors->has('password')) has-auth-error @endif">
                                    <label for="password" class="required width-password">{{ __('shop::app.customer.login-form.password') }}</label>:*
                                    <input type="password" class="control-password" name="password" required value="{{ old('password') }}" minlength="6">
                                    <button type="button" class="position-absolute eye"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                                    <span class="control-error">{{ $errors->first('password') }}</span>

                                </div>

                                <div class="forgot-password-link pt-3">
                                    <a class="pl-3 href-forgot" href="#"
                                        onclick="$('#forgot').show();$('#log, #myTab').hide();">
                                        {{ __('shop::app.customer.login-form.forgot_pass') }}
                                    </a>{{-- <img data-src="/images/square-for-modal.png" class="lazyload"> --}}

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
                        </form>
                    </div>

                    <div class="" id="forgot" style="display:none;">
                        <div class="forgot-text">{{ __('shop::app.customer.forgot-password.title') }}</div>
                        <form method="post" action="{{ route('customer.forgot-password.store') }}">
                            {{ csrf_field() }}
                            <div class="login-form p-3">
                                <div class="control-group text-center @if($errors->has('email')) has-auth-error @endif">
                                    <label for="email">{{ __('shop::app.customer.forgot-password.email') }}</label>
                                    <input type="email" class="control" name="email" required>
                                    <input type="hidden" name="forgot-pass" value="forgot-pass">
                                    <span class="control-error">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="button-group">
                                    <input class="button-modal-sing-in mb-1" type="submit"
                                        value="{{ __('shop::app.customer.forgot-password.submit') }}">
                                </div>
                                <div class="control-group" style="margin-bottom: 0;">
                                    <a href="#" class="href-forgot pl-3" onclick="$('#forgot').hide();$('#log, #myTab').show();">
                                        Back to Sign In
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        if( $('.has-auth-error').length && {{strpos(url()->current(), "reset-password") ? 'false' : 'true'}}) {
            $('#AuthModal').modal('show');

            if({{old('first_name') ? 'true' : 'false'}}) {
                $('#sign-tab').tab('show');
            } else if ({{old('forgot-pass') ? 'true' : 'false'}}) {
                $('#log-tab').tab('show');
                $('#log, #myTab').hide();
                $('#forgot').show();
            } else {
                $('#log-tab').tab('show');
            }
        };
        $('.eye').on('click', function (e) {
            e.preventDefault();
            viewPassword();
        });
        function viewPassword() {
            let passwordInput = $('.control-password');
            if(passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
            }
        }

    });
</script>
@endpush
