@extends('layouts.public')
@section('content')
    @include('public.products.breadcrumbs')
    @include('public.products.ticker')
    @include('public.products.download-price')

    <div class="row m-3 justify-content-center">
        @foreach($products as $product)
            @include('public.products.product-card', ['product' => $product])
        @endforeach
    </div>

@endsection