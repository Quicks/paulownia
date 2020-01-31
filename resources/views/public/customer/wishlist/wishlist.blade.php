@extends('layouts.public')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/customer-profile.css') }}?v1">
    @endpush

@section('content')

<div class="account-content">
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    @include('public.customer.profile-header', ['activeItem' => 'wishlist'])

    <div class="account-layout">

        <div class="account-head mb-15">
            <span class="account-heading">{{ __('shop::app.wishlist.title') }}</span>

            @if (count($items))
            <div class="account-action">
                <a href="{{ route('customer.wishlist.removeall') }}">{{ __('shop::app.wishlist.deleteall') }}</a>
            </div>
            @endif
            <div class="horizontal-rule"></div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}

        <div class="account-items-list">

            @if ($items->count())
            <div class="row justify-content-center mx-1 products-animation animated">
                @foreach($items as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12 position-relative one-product">
                        @include('public.products.product-card', ['product' => 
                            Webkul\Product\Models\ProductFlat::where('product_id', $item->product_id)
                                ->where('locale', app()->getLocale())->first()])
                        <div class="operations text-center">
                            <a class="btn btn-primary btn-md m-2" href="{{ route('customer.wishlist.remove', $item->id) }}">
                                Delete from wishlist
                            </a>

                            <a href="{{ route('customer.wishlist.move', $item->id) }}" class="btn btn-primary btn-md m-2">
                                {{ __('shop::app.wishlist.move-to-cart') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="empty">
                    {{ __('customer::app.wishlist.empty') }}
                </div>
            @endif
        </div>

        {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]) !!}

    </div>
</div>
@endsection