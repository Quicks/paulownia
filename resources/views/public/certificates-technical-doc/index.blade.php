@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cert-tech-doc.css') }}">
    @endpush


    <div class="col-12 mb-5">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') =>'header-footer.about us'])</div>

    <div class="row fon-for-partners m-0">
        <div class="col-12 partners-background position-relative">
            <div>
                <img class="img-leaf lazyload position-absolute" data-src="{{asset('/images/service-leaf-tree.png')}}">
            </div>
            <div class="partner-text">
                {{--@lang('about-us-header.our-partners')--}}
                Certificates and technical documentation
            </div>
        </div>

        <div class="row mx-auto">

            <div class="col-2">
                <img data-src="{{asset('/images/cert-long-1.png')}}" class="lazyload img-cert-long mt-5">
                <img data-src="{{asset('/images/cert-long-2.png')}}" class="lazyload img-cert-long mt-3">
                <img data-src="{{asset('/images/cert-long-3.png')}}" class="lazyload img-cert-long mt-3">
            </div>

            <div class="col-10"> </div>
        </div>
    </div>
@endsection
