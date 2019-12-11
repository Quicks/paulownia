@push('css')
    <link rel="stylesheet" href="{{asset('css/product-card.css') }}?v4">
@endpush

<div class="col-xl-3 col-md-6 col-sm-12 back-ground-img ml-3 mb-3 position-relative" style="max-width: 407px">
    @if($product->special_price != 0)
        <div class="position-absolute product-sale">-{{round(100-($product->special_price / ($product->price/100)))}}%
        </div>
    @endif
    <img data-src="{{asset('/images/our-products-box.png')}}" class="position-absolute box-product lazyload">
    <img data-src="{{asset('/images/our-products-like.png')}}" class="position-absolute like-product lazyload">
    @if(!empty($product->images[0]->path))
        <img data-src="{{asset('/storage/'.$product->images[0]->path)}}" style="border-radius: 25px 25px 0 0;width:100%"
             class="lazyload">
    @else
        <img data-src="{{asset('/images/our-products-col-fon.png')}}" style="border-radius: 25px 25px 0 0;width:100%"
             class="lazyload">
    @endif

    <img data-src="{{asset('/images/line-for-goods-in-card.png')}}" style="margin-top:-8%;width:100%" class="lazyload">
    <a href="{{url('/products/' . $product->product_id)}}" class="title-for-card">{{$product->name}}</a>
    @if($product->special_price != 0)
        <div class="price-for-card">{{number_format($product->special_price, 2)}} €</div>
    @else
        <div class="price-for-card">{{number_format($product->price, 2)}} €</div>
    @endif
    <div class="text-card">{{substr(strip_tags($product->short_description), 0, 90)}}</div>
</div>


