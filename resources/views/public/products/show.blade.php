@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{asset('css/show-product.css') }}?v2">
@endpush
@section('content')
    <div class="show-page-back">
        @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods',
        route('public.products.show', $product->url_key) => $product->name])

        <div>Name: {{$product->name}}</div>
        <div>Description: {{strip_tags($product->description)}}</div>
        @if(!empty($product->product()->first()->categories()->first()->name))
            <div>Category: {{$product->product()->first()->categories()->first()->name}}</div>
        @endif
        <div>Price: {{number_format($product->price, 2)}}</div>
        @if($product->special_price != 0)
            <div>Special price: {{number_format($product->special_price, 2)}}</div>
            <div>Discount: -{{round(100-($product->special_price / ($product->price/100)))}}%</div>
        @endif
        @if($product->height_tree!=0)
            <div>Tree height: {{$product->height_tree}}</div>
        @endif
        <div>Box volume: {{$product->volume_box}}</div>
        <div>Quantity per box: {{$product->delivery_unit_qty}}</div>
        <div>Min order: {{$product->min_order_qty}}</div>
        <div>Short description: {{strip_tags($product->short_description)}}</div>
        @isset($product->images)
            @foreach($product->images as $img)
                <div>
                    Images:
                    <img src="{{asset('storage/'.$img->path)}}">
                </div>
            @endforeach
        @endisset
        <div>SIMILAR PRODUCTS:</div>
        <div class="row m-3 justify-content-center">
            @foreach($similarProducts as $product)
                @include('public.products.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>

@endsection