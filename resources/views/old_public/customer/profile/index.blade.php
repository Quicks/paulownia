@extends('layouts.public')

@section('content')

    <div class="account-content pb-5">

        @include('public.customer.profile-header', ['activeItem' => 'profile'])

        <div class="pos-profile">
            <div>
                <span class="profile-profile-title">@lang('profile.basic')</span>
            </div>

            <div>
                <table class="profile-table mt-3">
                    <tbody>
                    <tr>
                        <td class="profile-table-item">@lang('profile.fname'):</td>
                        <td class="profile-table-info">{{ $customer->first_name }}</td>
                    </tr>

                    <tr>
                        <td class="profile-table-item">@lang('profile.lname'):</td>
                        <td class="profile-table-info">{{ $customer->last_name }}</td>
                    </tr>

                    <tr>
                        <td class="profile-table-item">@lang('profile.gender'):</td>
                        <td class="profile-table-info">{{ $customer->gender }}</td>
                    </tr>

                    <tr>
                        <td class="profile-table-item">@lang('profile.dob'):</td>
                        <td class="profile-table-info">{{ $customer->date_of_birth }}</td>
                    </tr>

                    <tr>
                        <td class="profile-table-item">Email:</td>
                        <td class="profile-table-info">{{ $customer->email }}</td>
                    </tr>

                    {{-- @if ($customer->subscribed_to_news_letter == 1)
                        <tr>
                            <td> {{ __('shop::app.footer.subscribe-newsletter') }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('shop.unsubscribe', $customer->email) }}">{{ __('shop::app.subscription.unsubscribe') }} </a>
                            </td>
                        </tr>
                    @endif --}}
                    </tbody>
                </table>
                <div class="pt-3 mt-3">
                    <a class="product-button" href="{{ route('profile.edit') }}">@lang('profile.edit')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
