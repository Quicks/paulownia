@push('css')
    <link rel="stylesheet" href="{{asset('css/product-card.css')}}?v3">
@endpush

    <div class="col back-ground-img m-3 position-relative">
        <div class="position-absolute product-sale">-3%</div>
        <img data-src="{{asset('/images/our-products-box.png')}}" class="position-absolute box-product lazyload">
        <img data-src="{{asset('/images/our-products-like.png')}}" class="position-absolute like-product lazyload">
        <img data-src="{{asset('/images/our-products-col-fon.png')}}" style="border-radius: 25px 25px 0 0;width:100%" class="lazyload">
        <img data-src="{{asset('/images/line-for-goods-in-card.png')}}" style="margin-top:-8%;width:100%" class="lazyload">
        <a href="#" class="title-for-card">Seedling Turbo Pro</a>
        <div class="price-for-card">4.00 €</div>
        <div class="text-card">Description, description,
            description, description, description,
            description, description
        </div>
    </div>
