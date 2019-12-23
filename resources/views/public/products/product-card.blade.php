@push('css')
    <link rel="stylesheet" href="{{asset('css/product-card.css') }}?v10">
@endpush

<div class="@if(url()->current()===route('public.products.index') )col-xl-4 col-md-12 @else col-xl-3 col-md-6 @endif col-sm-12 back-ground-img ml-3 mb-3 position-relative">
    @if($product->special_price != 0)
        <div class="position-absolute product-sale">-{{round(100-($product->special_price / ($product->price/100)))}}%
        </div>
    @endif

    @if(!empty($product->images[0]->path))
        <img data-src="{{asset('/storage/'.$product->images[0]->path)}}"
             class="lazyload img-product">
    @else
        <img data-src="{{asset('/images/our-products-col-fon.png')}}"
             class="lazyload img-product">
    @endif

    <img data-src="{{asset('/images/line-for-goods-in-card.png')}}" class="lazyload line-product-card">
    <div class="row m-0">

        <a href="{{route('public.products.show', $product->url_key)}}" class="col-8 title-for-card">{{$product-> name}}</a>

        <form action="{{ route('cart.add', $product->product_id) }}" method="POST">
            @csrf
            <input type="hidden" name="product" value="{{ $product->product_id }}">
            <input type="hidden" name="quantity" value="1">
            <button class="card-btn p-0 col-2 mt-1 box-m" {{ $product->haveSufficientQuantity(1) ? '' : 'disabled' }}>
                <img data-src="{{asset('/images/our-products-box.png')}}" class="box-product lazyload">
            </button>
        </form>

        <a href="#" class="col-2 mt-1 like-m">
            <img data-src="{{asset('/images/our-products-like.png')}}" class="like-product lazyload" style="border-radius:50%">
        </a>

        @if($product->special_price != 0)
            <div class="price-for-card col-12">{{number_format($product->special_price, 2)}} €</div>
        @else
            <div class="price-for-card col-12">{{number_format($product->price, 2)}} €</div>
        @endif

    </div>

    <div class="text-card">{{substr(strip_tags($product->short_description), 0, 90)}}</div>
</div>

