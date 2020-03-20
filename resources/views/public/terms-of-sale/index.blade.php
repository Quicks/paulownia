@extends('layouts.public')
@section('content')

    @push('css')
    <link rel="stylesheet" href="{{asset('css/lists.css') }}">
    @endpush

    <div class="row mb-5">

        <div class="col-2"></div>
        <div class="col-8 mt-5 main-border-green p-0">
            <div class="row m-0 p-0">
                <div class="col-12 mt-5"></div>
                <div class="col-12 p-0 line-for-letter ">
                    <img data-src="{{asset('images/logo.png')}}" class="lazyload img-letter">
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3 class="bolder">Your Invoise #10 for Order #26 </h3>
                        <p>Dear Olya ,</p>
                        <p> Thanks you for oyour Order <b class="line-under">#26</b> placed on 12.03.2020 08:12:23</p>
                    </div>
                    <div class="col-12 ">
                        <h3 class="bolder mt-5">Summary of Invoice</h3>
                        <div class="row">
                            <div class="col-9 p-0">
                                <h4 class="bolder mt-3">Shipping address</h4>
                                <p>Olya</p>
                                <p>city,street</p>
                                <p>Ukraine 34253</p>
                                <p>---</p>
                                <p>Contact:5287567285725</p>
                                <h4 class="mt-5">Shipping method</h4>
                                <h4 class="bolder" >Shipping to other countries(expect Spain/Portugal)-
                                    shipping to other countries(expect Spain/Portugal)</h4>

                            </div>

                            <div class="col-3 pr-0 pl-5 ">
                                <h4 class="bolder mt-3">Billing address</h4>
                                <p>Olya</p>
                                <p>city,street</p>
                                <p>Ukraine 34253</p>
                                <p>---</p>
                                <p>Contact:5287567285725</p>
                                <h4 class="mt-5">Payment method</h4>
                                <h4 class="bolder" >Cash on delivery</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row back-table">
                            <div class="col-8"><h6 class="bolder mt-2">Name</h6></div>
                            <div class="col-2"><h6 class="bolder mt-2">Price</h6></div>
                            <div class="col-2"><h6 class="bolder mt-2">Qty</h6></div>
                        </div>
                        <div class="row">
                            <div class="col-8 mt-2">Paulownia .....</div>
                            <div class="col-2 mt-2">€ 9.0</div>
                            <div class="col-2 mt-2">2</div>
                        </div>
                    </div>
                    <div class="col-12 mt-5 mb-5">
                        <div class="row">
                            <div class="col-7"></div>
                            <div class="col-3">
                                <h5>Subtotal</h5>
                                <h5>Shipping and Handling</h5>
                                <h5>Tax</h5>
                                <h5 class="bolder">Global total</h5>
                            </div>
                            <div class="col-2 text-right pr-0">
                                <h5 class="" >€ 18.00</h5>
                                <h5 >€ 0.00</h5>
                                <h5 >€ 0.00</h5>
                                <h5 class="bolder">€ 18.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-2"></div>
    </div>




    {{--@push('css')--}}
        {{--<link rel="stylesheet" href="{{asset('css/products-price.css') }}?v3">--}}
        {{--<link rel="stylesheet" href="{{asset('css/terms-of-sale.css') }}?v7">--}}
    {{--@endpush--}}

    {{--@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'terms.terms' ])--}}

    {{--<div class="fon-for-terms mt-5">--}}
        {{--<div class="price-background">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12" style="height:200px">--}}
                    {{--<div class="price-img-leaf-position terms-img-leaf ">--}}
                        {{--<img class="price-img-leaf lazyload"--}}
                             {{--data-src="{{asset('/images/service-leaf-tree.png')}}">--}}
                    {{--</div>--}}
                    {{--<div class="text-on-leaf mt-5 ">--}}
                       {{--@lang('terms.text-on-leaf')--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<ul class="title-for-rules mt-4 ml-3 mr-5 mb-0">--}}
           {{--@lang('terms.title')--}}
            {{--<li class="text-for-rules pt-5"><span class="title-for-rules">@lang('terms.website-visitor')</span>--}}
                {{---@lang('terms.text-website-visitor').</li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules"> @lang('terms.user')</span>-@lang('terms.text-user'). </li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules">@lang('terms.buyer')</span>--}}
                {{---@lang('terms.text-buyer').--}}
            {{--</li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules"> @lang('terms.seller')</span>--}}
                {{--- IRIS LLC OGRN 5077746751539, TIN 7734563578 / KPP 773401001, Legal address: 123098,--}}
                {{--Moscow, ul. Marshal Vasilevsky, 3, building 1.--}}
            {{--</li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules">@lang('terms.online-store')</span>--}}
                {{---@lang('terms.text-online-store').--}}
            {{--</li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules">@lang('terms.goods')</span>--}}
                {{--- @lang('terms.text-goods').--}}
            {{--</li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules"> @lang('terms.order')  </span>--}}
                {{---@lang('terms.text-order').--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<ol class="title-for-rules mt-4 ml-3 mr-5 mb-0 " style="height:856px;">--}}
            {{--1.@lang('terms.general-provisions')--}}
            {{--<li class="text-for-rules"><span class="title-for-rules">1.1.</span>@lang('terms.point-1') </li>--}}
            {{--<li class="text-for-rules"><span class="title-for-rules">1.2.</span>@lang('terms.point-2') </li>--}}
        {{--</ol>--}}

    {{--</div>--}}

@endsection