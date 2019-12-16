@push('css')
    <link rel="stylesheet" href="{{asset('css/products-price.css') }}">
@endpush

<div class="price-background">
    <div class="row">
        <div class="col-12" style="height: 220px">
            <div class="price-img-leaf-position">
                <img class="price-img-leaf lazyload" data-src="{{asset('/images/service-leaf-tree.png')}}">
            </div>
            <div class="price-text mt-5">
                @lang('products.price-text')
                <a href="#">
                    <img src="{{asset('images/price-button.png')}}">
                </a>
            </div>
        </div>
    </div>
</div>
