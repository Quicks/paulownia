@if(!empty($products))
        @foreach($products as $product)
            <div class="col-md-3 col-sm-6 col-xs-12 position-relative one-product">
                @include('public.products.product-card', ['product' => $product])
            </div>
        @endforeach
@endif