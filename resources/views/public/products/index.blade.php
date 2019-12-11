@extends('layouts.public')
@section('content')
    <div class="row m-3 justify-content-center">
        @foreach($products as $product)
            @include('public.products.product-card', ['product' => $product])
        @endforeach
    </div>

@endsection