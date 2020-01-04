@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/partners.css') }}">
    @endpush


    <div class="col-12 mb-5">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') =>'header-footer.about us')]</div>

    <div class="row fon-for-partners m-0">
        <div class="col-12 partners-background position-relative">
            <div>
                <img class="img-leaf lazyload position-absolute" data-src="{{asset('/images/service-leaf-tree.png')}}">
            </div>
            <div class="partner-text">@lang('about-us-header.our-partners')</div>
        </div>

        <div class="row mx-auto justify-content-center">

        </div>
    </div>
@endsection
