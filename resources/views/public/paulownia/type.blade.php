@extends('layouts.public')
@pushonce('css:product-card')
<link rel="stylesheet" href="{{asset('css/product-card.css') }}?v18">
@endpushonce
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/types-of-paulownia.css')}}">
        <link rel="stylesheet" href="{{asset('css/about-paulownia.css')}}">
        <link rel="stylesheet" href="{{asset('css/our-products.css') }}?v7">
    @endpush


    <div class="row">
        <div class="col-12 border-up  p-sm-0">
            @include('public.paulownia.nav-paulownia')

            {{--<div class="row mt-3 mb-3 ml-2">--}}
            {{--<div class="col-xl-2 col-md-0 col-sm-0"></div>--}}
            {{--<div class="col-xl-6 col-md-12 col-sm-12 pl-4">--}}

            {{--<a  @if(url()->current() === route('public.paulownia.about')) class="text-href p-xl-3 p-md-3 p-sm-0 tyro "--}}
            {{--@else class="text-href p-xl-3 p-md-3 p-sm-0" @endif href="{{route('public.paulownia.about')}}">@lang('about-paulownia.about-paulownia')</a>--}}


            {{--<a class="text-href p-xl-3 p-md-3 p-sm-1 " href="{{route('public.paulownia.type')}}">@lang('about-paulownia.types-of-paulownia')</a>--}}
            {{--<a class="text-href p-xl-3 p-md-3 p-sm-0 " href="{{route('public.paulownia.planting')}}">@lang('about-paulownia.plantation-creation')</a>--}}
            {{--</div>--}}
            {{--<div class="col-xl-4 col-md-0 col-sm-0"></div>--}}
            {{--</div>--}}
        </div>
        <div class="col-12 fon-for-title-1 ">
            <div class="row p-0 m-0 ">
                <div class="col-xl-2 col-md-2 col-sm-0"></div>
                <div class="col-9 mt-5 pt-5 mb-5 pb-5">
                    <div class="title-text mt-5 pt-5 ">@lang('about-paulownia.types-of-paulownia')</div>
                    <div class="text-under-title ">@lang('about-paulownia.text-1')
                    </div>
                    <div class="col-xl-1 col-md-1 col-sm-0"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 p-0 fon-for-paulownia-type">
        <nav>
            <div class="nav nav-tabs justify-content-between px-4" id="nav-tab" role="tablist">
                @foreach($types as $type)
                    <a class="paulownia-type nav-item nav-link  pt-5 pb-5 @if($loop->first) active show @endif"
                       data-toggle="tab" role="tab"
                       data-type="{{$type->admin_name}}"
                       href="#nav-{{urlencode($type->admin_name)}}"
                       aria-controls="nav-{{urlencode($type->admin_name)}}"
                       aria-selected="@if($loop->first) true @else false @endif"
                    >
                        {{$type->admin_name}}
                    </a>
                @endforeach
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            @foreach($types as $type)
                <div class="tab-pane fade @if($loop->first) active show @endif"
                     id="nav-{{urlencode($type->admin_name)}}" role="tabpanel"
                     aria-labelledby="nav-{{urlencode($type->admin_name)}}"
                >
                    <div class="col-12 p-5 text-about-type">
                        {{$type->label}}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12 text-center">
            <div class="products-title-1 font-weight-bold text-center">@lang('about-paulownia.our-products')</div>
            <hr class="line-for-products-1">
        </div>

        <div class="col-12">

            <div id="productsType" class="row justify-content-center mx-1 products-animation animated">
               <div id="firstType" class="row justify-content-center mx-1 products-animation animated">
                   @foreach($productsFirst as $product)
                       <div class="col-md-3 col-sm-6 col-xs-12 position-relative one-product">
                           @include('public.products.product-card', ['product' => $product])
                       </div>
                   @endforeach
               </div>
                @include('public.paulownia.products-type')
            </div>

            <div class="row justify-content-center p-5">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{route('public.products.index')}}">
                        <button class="product-button w-100">@lang('about-paulownia.all-goods')</button>
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.paulownia-type').on('click', function () {
                let $this = $(this);
                let type = $this.data('type');
                $.ajax({
                    url: "/paulownia/productsType",
                    method: 'get',
                    data: {type: type}
                })
                    .done(function (data) {
                        $("#firstType").hide();
                        $("#productsType").empty();
                        $("#productsType").append(data.html);
                    })
            })
        })

    </script>
@endpush