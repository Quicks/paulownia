@foreach($products as $product)
    <div class="col-xl-4 col-sm-12 position-relative">
        @include('public.products.product-card', ['product' => $product])
    </div>
@endforeach