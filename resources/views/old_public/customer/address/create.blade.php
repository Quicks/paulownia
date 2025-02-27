@extends('layouts.public')
@section('content')
    <div class="account-content pb-5">
        @include('public.customer.profile-header', ['activeItem' => 'address'])
        <div class="pos-profile">
            <div>
                <span class="profile-profile-title">@lang('profile.add-address')</span>
            </div>
            {!! view_render_event('bagisto.shop.customers.account.address.create.before') !!}
            <form method="post" action="{{ route('address.create') }}" @submit.prevent="onSubmit">
                <div class="account-table-content">
                    @csrf
                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.before') !!}
                    <div class="control-group" :class="[errors.has('address1[]') ? 'has-error' : '']">
                        <label for="address_0" class="profile-item-edit required">@lang('profile.street-address'):</label>
                        <input type="text" class="control" name="address1[]" id="address_0" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.street-address') }}&quot;">
                        <span class="control-error" v-if="errors.has('address1[]')">@{{ errors.first('address1[]') }}</span>
                    </div>

                    @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                        <div class="control-group" style="margin-top: -25px;">
                            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                                <input type="text" class="control" name="address1[{{ $i }}]" id="address_{{ $i }}">
                            @endfor
                        </div>
                    @endif
                    @include('public.customer.address.country-state', ['countryCode' => old('country'), 'stateCode' => old('state')])

                    <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                        <label for="city" class="profile-item-edit required">@lang('profile.city'):</label>
                        <input type="text" class="control" name="city" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.city') }}&quot;">
                        <span class="control-error" v-if="errors.has('city')">@{{ errors.first('city') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('postcode') ? 'has-error' : '']">
                        <label for="postcode" class="profile-item-edit required">@lang('profile.postcode'):</label>
                        <input type="text" class="control" name="postcode" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.postcode') }}&quot;">
                        <span class="control-error" v-if="errors.has('postcode')">@{{ errors.first('postcode') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                        <label for="phone" class="profile-item-edit required">@lang('profile.phone'):</label>
                        <input type="text" class="control" name="phone" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.phone') }}&quot;">
                        <span class="control-error" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.after') !!}

                    <div class="pt-3 mt-3">
                        <input class="product-button" type="submit" value="@lang('profile.save-address')">
                    </div>

                </div>

            </form>

            {!! view_render_event('bagisto.shop.customers.account.address.create.after') !!}

        </div>
    </div>

@endsection