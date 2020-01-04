@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/partners.css') }}">
    @endpush


    <div class="col-12 mb-5">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') =>'header-footer.about us')</div>

    <div class="row fon-for-partners m-0">
        <div class="col-12 partners-background position-relative">
            <div>
                <img class="img-leaf lazyload position-absolute" data-src="{{asset('/images/service-leaf-tree.png')}}">
            </div>
            <div class="partner-text">@lang('about-us-header.our-partners')</div>
        </div>

            <div class="row mx-auto justify-content-center">

                <div class="col-xl-3 col-md-12 col-sm-12 text-center m-3 container-partners ">
                    <img data-src="{{asset('/images/oxizonia-about-r.png')}}" class="lazyload img-partners" style="max-width: 20%">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/oUR-GREEN-COUNTRy.png')}}" class="lazyload img-partners" style="max-width:80%;padding:10% 0 5% 0">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3  container-partners ">
                    <img data-src="{{asset('/images/logo_teruel_ruralvia 1.png')}}" class="lazyload img-partners" style="max-width:80%">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/suma_teruel_1.png')}}" class="lazyload img-partners" style="max-width:60%">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/layout_set_logo_1.png')}}" class="lazyload img-partners" style="max-width:80%">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/heart-tree.png')}}" class="lazyload img-partners" style="max-width:20%">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/Group-partners.png')}}" class="lazyload img-partners" style="max-width:40%">
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12  text-center  m-3  container-partners ">
                    <img data-src="{{asset('/images/bajo-partners.png')}}" class="lazyload img-partners" style="max-width:60%">
                </div>

            </div>
    </div>
@endsection
