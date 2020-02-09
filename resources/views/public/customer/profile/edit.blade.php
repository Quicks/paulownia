@extends('layouts.public')
@section('content')
    <div class="account-content pb-5">

        @include('public.customer.profile-header', ['activeItem' => 'profile'])

        <div class="pos-profile">
            <div class="mb-3"><span class="profile-profile-title">@lang('profile.edit-profile')</span></div>

            <form method="post" action="{{ route('profile.edit') }}" @submit.prevent="onSubmit">
                <div class="edit-form">
                    @csrf

                    <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                        <label for="first_name" class="required profile-item-edit">@lang('profile.fname'):</label>
                        <input type="text" class="control profile-edit-info" name="first_name"
                               value="{{ old('first_name') ?? $customer->first_name }}"
                               v-validate="'required'"
                               data-vv-as="&quot;{{ __('shop::app.customer.account.profile.fname') }}&quot;">
                        <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                        <label for="last_name" class="required profile-item-edit">@lang('profile.lname'):</label>
                        <input type="text" class="control profile-edit-info" name="last_name"
                               value="{{ old('last_name') ?? $customer->last_name }}"
                               v-validate="'required'"
                               data-vv-as="&quot;{{ __('shop::app.customer.account.profile.lname') }}&quot;">
                        <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('gender') ? 'has-error' : '']">
                        <label for="gender" class="required profile-item-edit">@lang('profile.gender'):</label>
                        <select name="gender" class="control ml-4 select-edit" v-validate="'required'"
                                data-vv-as="&quot;{{ __('shop::app.customer.account.profile.gender') }}&quot;">
                            <option value="" hidden @if ($customer->gender == "") selected @endif></option>
                            <option value="Other"
                                    @if ($customer->gender == "Other") selected @endif>@lang('profile.gender-other')</option>
                            <option value="Male"
                                    @if ($customer->gender == "Male") selected @endif>@lang('profile.gender-male')</option>
                            <option value="Female"
                                    @if ($customer->gender == "Female") selected @endif>@lang('profile.gender-female')</option>
                        </select>
                        <span class="control-error" v-if="errors.has('gender')">@{{ errors.first('gender') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('date_of_birth') ? 'has-error' : '']">
                        <label for="date_of_birth" class="profile-item-edit">@lang('profile.dob'):</label>
                        <input type="date" class="control profile-edit-info" name="date_of_birth"
                               value="{{ old('date_of_birth') ?? $customer->date_of_birth }}"
                               v-validate="" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.dob') }}&quot;">
                        <span class="control-error" v-if="errors.has('date_of_birth')">@{{ errors.first('date_of_birth') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email" class="required profile-item-edit">Email:</label>
                        <input type="email" class="control profile-edit-info" name="email" value="{{ old('email') ?? $customer->email }}"
                               v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.email') }}&quot;">
                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>

                    <div class="control-group position-relative" :class="[errors.has('oldpassword') ? 'has-error' : '']">
                        <label for="password" class="profile-item-edit">@lang('profile.opassword'):</label>
                        <input type="password" class="control profile-edit-info control-password" name="oldpassword"
                               data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;"
                               v-validate="'min:6'">
                        <button type="button" class="position-absolute eye-edit"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                        <span class="control-error" v-if="errors.has('oldpassword')">@{{ errors.first('oldpassword') }}</span>
                    </div>

                    <div class="control-group position-relative" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password" class="profile-item-edit">@lang('profile.password'):</label>
                        <input type="password" id="password" class="control profile-edit-info control-password" name="password"
                               data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;"
                               v-validate="'min:6'">
                        <button type="button" class="position-absolute eye-edit"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>

                    <div class="control-group position-relative" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                        <label for="password" class="profile-item-edit">@lang('profile.confpassword'):</label>
                        <input type="password" id="password_confirmation" class="control profile-edit-info control-password" name="password_confirmation"
                               data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;"
                               v-validate="'min:6|confirmed:password'">
                        <button type="button" class="position-absolute eye-edit"><img src="{{asset("/images/eye-for-password-modal.png")}}"></button>
                        <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}

                    <div class="pt-3 mt-3">
                        <input class="product-button" type="submit" value="@lang('profile.upd-profile')">
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.eye-edit').on('click', function (e) {
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