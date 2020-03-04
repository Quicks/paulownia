@push('css')
    <link rel="stylesheet" href="{{asset('css/our-products.css') }}?v10">
@endpush

<div class="main-content">

    <div><img data-src="{{asset('images/our-products-line-up.png') }}" class="line-style-up lazyload"></div>

        <div>
            <div class="products-title font-weight-bold text-center">Our products</div>
            <hr class="line-for-products">
        </div>

        <div class="row justify-content-center mx-1 products-animation animated">
            @foreach($products as $product)
                <div class="col-md-3 col-sm-6 col-xs-12 position-relative one-product">
                    @include('public.products.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>

        <div class="row justify-content-end mx-1">
            <div class="col-md-3 col-sm-6 col-xs-12 margin-425">
                <a href="{{route('public.products.index')}}">
                    <button class="product-button w-100"> All goods </button>
                </a>
            </div>
        </div>

    <div> <img src="/images/our-products-line-down.png" class="line-style-down"> </div>

</div>

@push('scripts')
<script>
    $(document).ready(function () {
        if(window.screen.width < 768) {
            $('.one-product').slice(4, 10).remove(); //show only four products on small screens
        }
        if(window.screen.width < 576) {
            $('.one-product').slice(2, 10).remove(); //show only two products on extra small screens
        }
    });
</script>
@endpush

