@extends('layouts.public')

@section('content')

    <div class="account-content pb-5">

        @include('public.customer.profile-header', ['activeItem' => 'address'])

        <div class="pos-profile">
            @if ($addresses->isEmpty())
                <div>@lang('profile.empty-address')</div>
                <br/>
                <a class="product-button" href="{{ route('address.create') }}">@lang('profile.add-address')</a>
            @else
                <div class="pb-3 text-right mr-3 mt-4">
                    <a class="product-button" href="{{ route('address.create') }}">@lang('profile.add-address')</a>
                    <hr class="mt-5">
                </div>
                    <div class="row">
                        @foreach ($addresses as $address)
                       <div class="col-xl-6 col-md-6 col-sm-12">
                        <table class="mt-3" style="border-collapse: separate; border-spacing:15px ">

                            <tbody>
                            <tr>
                                <td class="text-right item-address">@lang('profile.street-address'):</td>
                                <td class="profile-table-info">{{ $address->address1 }}</td>
                            </tr>
                            <tr>
                                <td class="text-right item-address">@lang('profile.city'):</td>
                                <td class="profile-table-info">{{ $address->city }}</td>
                            </tr>
                            <tr>
                                <td class="text-right item-address">@lang('profile.state'):</td>
                                <td class="profile-table-info">{{ $address->state }}</td>
                            </tr>
                            <tr>
                                <td class="text-right item-address">@lang('profile.country'):</td>
                                <td class="profile-table-info">{{core()->country_name($address->country)}}</td>
                            </tr>
                            <tr>
                                <td class="text-right item-address">@lang('profile.postcode'):</td>
                                <td class="profile-table-info">{{$address->postcode}}</td>
                            </tr>
                            <tr>
                                <td class="text-right item-address">@lang('profile.phone'):</td>
                                <td class="profile-table-info">{{$address->phone}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="m-4">
                            <a class="product-button mr-3" href="{{ route('address.edit', $address->id) }}">
                                @lang('profile.edit')
                            </a>
                            <a class="product-button" href="{{ route('address.delete', $address->id) }}"
                               onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')">
                                @lang('profile.delete')
                            </a>
                        </div>
                    </div>
                        @endforeach




                    </div>
                <hr>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteAddress(message) {
            if (!confirm(message))
                event.preventDefault();
        }
    </script>
@endpush
