@extends('layouts.public')
@section('content')

    <style>

        .fon-text{
            color: white;
        }
        .fon-text:hover{
            color:#8CBD02;;
        }

    </style>

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/service.css') }}?v2">
    @endpush

    <div class="row m-0 position-relative" >

        <div class="col-12 p-0 fon-service">@include('public.breadcrumbs', $breadcrumbs = [route('public.analysis-and-personal-design.index') => 'header-footer.analysis and personal design'])

            <div class="text-service-title">@lang('header-footer.analysis and personal design')</div>
            <img data-src="{{asset('/images/line-for-main-slider.png')}}" class="lazyload line-img position-absolute">

        </div>

        <div class="col-12 fon-text-service">
            <div class="text-service">Paulownia Elongata (“Elongated”)@lang('service.text').</div>
        </div>
    </div>

@endsection


