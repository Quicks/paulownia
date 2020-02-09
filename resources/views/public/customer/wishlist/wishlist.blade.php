@extends('layouts.public')
@section('content')

    <div class="account-content">
        @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
        @include('public.customer.profile-header', ['activeItem' => 'wishlist'])
        <div class="account-head mb-5 ">

            @if (count($items))
                <div class="text-right mr-3">
                    <a class="product-button"
                       href="{{ route('customer.wishlist.removeall') }}">@lang('profile.deleteall')</a>
                </div>
            @endif
        </div>

        <div class="account-items-list pb-5">
            @if ($items->count())
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12 position-relative one-product mt-3">
                            @include('public.products.product-card', ['product' =>
                                Webkul\Product\Models\ProductFlat::where('product_id', $item->product_id)
                                    ->where('locale', app()->getLocale())->first()])
                            <div class="text-center">
                                <a class="product-button"
                                   href="{{ route('customer.wishlist.remove', $item->id) }}">
                                    @lang('profile.remove')
                                </a>
                            </div>
                            <div class="text-center mt-2">
                                <a href="{{ route('customer.wishlist.move', $item->id) }}"
                                   class="product-button">
                                    @lang('profile.move')
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="d-flex justify-content-center">
                    @lang('profile.empty')
                </div>
            @endif
        </div>

    </div>
@endsection