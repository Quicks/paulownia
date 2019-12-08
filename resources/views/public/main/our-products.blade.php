@push('css')
    <link rel="stylesheet" href="{{asset('css/our-products.css') }}?v2">
@endpush

<div class="main-content">

    <div><img data-src="{{asset('images/our-products-line-up.png') }}" class="line-style-up lazyload"></div>

        <div>
            <div class="products-title font-weight-bold text-center">Our products</div>
            <hr class="line-for-products">
        </div>

            <div class="row m-3">
                @include('public.products.product-card')
                @include('public.products.product-card')
                @include('public.products.product-card')
                @include('public.products.product-card')
            </div>

            <div class="row m-3">
                @include('public.products.product-card')
                @include('public.products.product-card')
                @include('public.products.product-card')
                @include('public.products.product-card')
            </div>

        <button class="product-button"> All goods </button>

    <div> <img src="/images/our-products-line-down.png" class="line-style-down"> </div>

</div>


