@extends('layouts.public')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{asset('css/products-price.css') }}?v2">
        <link rel="stylesheet" href="{{asset('css/terms-of-sale.css') }}?v4">
    @endpush

    @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'terms.terms' ])

    <div class="fon-for-terms mt-5">
        <div class="price-background">
            <div class="row">
                <div class="col-12" style="height:200px">
                    <div class="price-img-leaf-position terms-img-leaf ">
                        <img class="price-img-leaf lazyload"
                             data-src="{{asset('/images/service-leaf-tree.png')}}">
                    </div>
                    <div class="text-on-leaf mt-5 ">
                       @lang('terms.text-on-leaf')
                    </div>
                </div>
            </div>
        </div>


        <ul class="title-for-rules mt-4 ml-3 mr-5 mb-0">
           @lang('terms.title')
            <li class="text-for-rules pt-5"><span class="title-for-rules">@lang('terms.website-visitor')</span>
                -@lang('terms.text-website-visitor').</li>
            <li class="text-for-rules"><span class="title-for-rules"> @lang('terms.user')</span>-@lang('terms.text-user'). </li>
            <li class="text-for-rules"><span class="title-for-rules">@lang('terms.buyer')</span>
                -@lang('terms.text-buyer').
            </li>
            <li class="text-for-rules"><span class="title-for-rules"> @lang('terms.seller')</span>
                - IRIS LLC OGRN 5077746751539, TIN 7734563578 / KPP 773401001, Legal address: 123098,
                Moscow, ul. Marshal Vasilevsky, 3, building 1.
            </li>
            <li class="text-for-rules"><span class="title-for-rules">@lang('terms.online-store')</span>
                -@lang('terms.text-online-store').
            </li>
            <li class="text-for-rules"><span class="title-for-rules">@lang('terms.goods')</span>
                - @lang('terms.text-goods').
            </li>
            <li class="text-for-rules"><span class="title-for-rules"> @lang('terms.order')  </span>
                -@lang('terms.text-order').
            </li>
        </ul>
        <ol class="title-for-rules mt-4 ml-3 mr-5 mb-0 " style="height:856px;">
            1.@lang('terms.general-provisions')
            <li class="text-for-rules"><span class="title-for-rules">1.1.</span>@lang('terms.point-1') </li>
            <li class="text-for-rules"><span class="title-for-rules">1.2.</span>@lang('terms.point-2') </li>
        </ol>

    </div>

@endsection