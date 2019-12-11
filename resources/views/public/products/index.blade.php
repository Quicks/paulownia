@extends('layouts.public')
@section('content')
    <div class="row m-3 justify-content-center">
        @foreach($products as $product)
            @include('public.products.product-card', ['product' => $product])
            <a href="{{ url('/products/' . $product->product_id) }}">view product</a>
        @endforeach
    </div>

@endsection