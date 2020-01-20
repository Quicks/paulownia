<div class="modal fade" id="AuthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="sign-tab" data-toggle="tab" href="#sign" кole="tab"
                             aria-controls="sign" aria-selected="true">
                            Sign in
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="log-tab" data-toggle="tab" href="#log" role="tab" 
                                aria-controls="log" aria-selected="false">
                            login
                        </a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sign" role="tabpanel" aria-labelledby="sign-tab">
                        <form method="POST" action="{{ route('customer.session.create') }}">
                            {{ csrf_field() }}
                            <div class="login-form">

                                <div class="control-group" class="@if($errors->has('email')) has-error @endif">
                                    <label for="email" class="required">{{ __('shop::app.customer.login-form.email') }}</label>
                                    <input type="text" class="control" name="email" required value="{{ old('email') }}">
                                    <span class="control-error">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="control-group" class="@if($errors->has('password')) has-error @endif">
                                    <label for="password" class="required">{{ __('shop::app.customer.login-form.password') }}</label>
                                    <input type="password" class="control" name="password" required value="{{ old('password') }}">
                                    <span class="control-error">{{ $errors->first('password') }}</span>
                                </div>

                                <div class="forgot-password-link">
                                    <a href="{{ route('customer.forgot-password.create') }}">
                                        {{ __('shop::app.customer.login-form.forgot_pass') }}
                                    </a>

                                    <div class="mt-10">
                                        @if (Cookie::has('enable-resend'))
                                            @if (Cookie::get('enable-resend') == true)
                                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <input class="btn btn-primary btn-lg" type="submit" 
                                    value="{{ __('shop::app.customer.login-form.button_title') }}">
                        </div>

                    </div>

                    <div class="tab-pane fade" id="log" role="tabpanel" aria-labelledby="log-tab">
                        <form method="post" action="{{ route('customer.register.create') }}">
                            {{ csrf_field() }}

                            <div class="login-form">

                                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                    <label for="first_name" class="required">{{ __('shop::app.customer.signup-form.firstname') }}</label>
                                    <input type="text" class="control" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                                    <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                                    <label for="last_name" class="required">{{ __('shop::app.customer.signup-form.lastname') }}</label>
                                    <input type="text" class="control" name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                                    <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                    <label for="email" class="required">{{ __('shop::app.customer.signup-form.email') }}</label>
                                    <input type="email" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
                                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                                    <label for="password" class="required">{{ __('shop::app.customer.signup-form.password') }}</label>
                                    <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
                                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                                    <label for="password_confirmation" class="required">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>
                                    <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
                                    <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                                </div>

                                <button class="btn btn-primary btn-lg" type="submit">
                                    {{ __('shop::app.customer.signup-form.button_title') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>