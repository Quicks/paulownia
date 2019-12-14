@push('css')
    <link rel="stylesheet" href="{{asset('css/product-card.css') }}?v6">
@endpush

<div class="col-xl-3 col-md-6 col-sm-12 back-ground-img ml-3 mb-3 position-relative">
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
            <span class="col-6 title-for-card">hgshghkghk</span>
            <a href="#" class="col-2 ml-5 mt-2">
                <img data-src="{{asset('/images/our-products-box.png')}}" class="box-product lazyload">
            </a>
            <a href="#" class="col-2 pl-1 mt-2">
                 <img data-src="{{asset('/images/our-products-like.png')}}" class="lazyload like-product" style="border-radius:50%;">
            </a>
            <div class="price-for-card">3€</div>

        </div>


    {{--<a href="{{route('public.products.show', $product->product_id)}}" class="title-for-card">{{$product->name}}</a>--}}
    {{--@if($product->special_price != 0)--}}
        {{--<div class="price-for-card">{{number_format($product->special_price, 2)}} €</div>--}}
    {{--@else--}}
        {{--<div class="price-for-card">{{number_format($product->price, 2)}} €</div>--}}
    {{--@endif--}}
    <div class="text-card">{{substr(strip_tags($product->short_description), 0, 90)}}</div>
</div>

