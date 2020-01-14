@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    @endpush

    <div class="row m-0 position-relative" >

        <div class="col-12 p-0 fon-service">@include('public.breadcrumbs', $breadcrumbs = [route('public.consultation-during-the-cultivation.index') => 'header-footer.consultation during the cultivation'])

            <div class="text-service-title">@lang('header-footer.consultation during the cultivation')</div>
            <img data-src="{{asset('/images/line-for-main-slider.png')}}" class="lazyload line-img position-absolute">

        </div>

        <div class="col-12 fon-text-service">
            <div class="text-service">Paulownia Elongata (“Elongated”)@lang('service.text').</div>
        </div>
    </div>

@endsection

