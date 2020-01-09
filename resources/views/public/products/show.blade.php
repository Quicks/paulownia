{{--@extends('layouts.public')--}}
{{--@push('css')--}}
    {{--<link rel="stylesheet" href="{{asset('css/show-product.css') }}?v2">--}}
{{--@endpush--}}
{{--@section('content')--}}
    {{--<div class="show-page-back">--}}
        {{--@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods',--}}
        {{--route('public.products.show', $product->url_key) => $product->name])--}}

        {{--<div>Name: {{$product->name}}</div>--}}
        {{--<div>Description: {{strip_tags($product->description)}}</div>--}}
        {{--@if(!empty($product->product()->first()->categories()->first()->name))--}}
            {{--<div>Category: {{$product->product()->first()->categories()->first()->name}}</div>--}}
        {{--@endif--}}
        {{--<div>Price: {{number_format($product->price, 2)}}</div>--}}
        {{--@if($product->special_price != 0)--}}
            {{--<div>Special price: {{number_format($product->special_price, 2)}}</div>--}}
            {{--<div>Discount: -{{round(100-($product->special_price / ($product->price/100)))}}%</div>--}}
        {{--@endif--}}
        {{--@if($product->height_tree!=0)--}}
            {{--<div>Tree height: {{$product->height_tree}}</div>--}}
        {{--@endif--}}
        {{--<div>Box volume: {{$product->volume_box}}</div>--}}
        {{--<div>Quantity per box: {{$product->delivery_unit_qty}}</div>--}}
        {{--<div>Min order: {{$product->min_order_qty}}</div>--}}
        {{--<div>Short description: {{strip_tags($product->short_description)}}</div>--}}
        {{--@isset($product->images)--}}
            {{--@foreach($product->images as $img)--}}
                {{--<div>--}}
                    {{--Images:--}}
                    {{--<img src="{{asset('storage/'.$img->path)}}">--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--@endisset--}}
        {{--<div>@lang('products.similar-products')</div>--}}
        {{--<div class="row m-3 justify-content-center">--}}
            {{--@foreach($similarProducts as $similarProduct)--}}
                {{--@if($product->id == $similarProduct->id) @continue @endif--}}
                {{--<div class="col-xl-3 col-md-6 col-sm-12 back-ground-img ml-3 mb-3 position-relative">--}}
                    {{--@include('public.products.product-card', ['product' => $similarProduct])--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}

{{--@endsection--}}

@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{asset('css/show-product.css') }}?v2">
@endpush
@section('content')

    <div class="show-page-back">

        @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods',
         route('public.products.show', $product->url_key) => $product->name])

        <div class="row">
            <div class="col-6">1</div>
            <div class="col-6">
                <ul class="style-for-list-show">
                    <li class="text-title-for-show mt-3 mb-3">{{$product->name}}</li>
                    <li class="text-title-for-show mb-3">
                        @if($product->special_price != 0)
                            {{number_format($product->special_price, 2)}} {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                        @else
                           {{number_format($product->price, 2)}} {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                        @endif
                    </li>
                    <li class="text-under-prise-show mb-3">@lang('products.without-VAT')</li>
                    <li class="text-red-show mb-4">Over 200 pieces discount: -5%</li>
                    @if(!empty($product->reservation))
                    <li>{{$product->reservation}}</li>
                    @endif
                    <li>@lang('products.min-order') {{$product->min_order_qty}} @lang('products.pieces').</li>
                </ul>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                           role="tab" aria-controls="nav-home" aria-selected="true">@lang('products.size')</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                           role="tab" aria-controls="nav-profile" aria-selected="false">@lang('products.product-information')</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                           role="tab" aria-controls="nav-contact" aria-selected="false">@lang('products.characteristic')</a>
                        <a class="nav-item nav-link" id="nav-contact-tab-1" data-toggle="tab" href="#nav-contact-1"
                           role="tab" aria-controls="nav-contact-1" aria-selected="false">@lang('products.delivery')</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active mt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <ul class="style-for-list-show mt-5">
                            @if(!empty($product->height_tree))
                            <li class="size-list">@lang('products.height'): {{$product->height_tree}}</li>
                            @endif
                            <li class="size-list">@lang('products.volume'): {{$product->volume_box}} </li>
                            <li class="size-list">@lang('products.cartridge') {{$product->delivery_unit_qty}} @lang('products.units')</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {{strip_tags($product->short_description)}}
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        {{strip_tags($product->description)}}
                    </div>
                    <div class="tab-pane fade mt-4" id="nav-contact-1" role="tabpanel" aria-labelledby="nav-contact-tab-1">
                        @if(!empty($product->delivery))
                            {{$product->delivery}}
                        @endif
                    </div>
                </div>
                <div class="mt-5">
                    <label>@lang('products.amount')</label>
                    <input type="number">
                    <span>@lang('products.total')</span>
                    <span>123</span>
                    <a href="#">
                        <button class="product-button"> @lang('products.add-cart') </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="title-for-cards-show-product text-center mt-5 mb-3">@lang('products.similar-products')</div>
        @foreach($similarProducts as $similarProduct)
            @if($product->id == $similarProduct->id) @continue @endif
            <div class="col-xl-3 col-md-6 col-sm-12 back-ground-img ml-3 mb-3 position-relative">
                @include('public.products.product-card', ['product' => $similarProduct])
            </div>
        @endforeach
        <div class="text-center pb-5">
            <a href="{{route('public.products.index')}}">
                <button class="product-button"> All goods </button>
            </a>
        </div>
    </div>

@endsection