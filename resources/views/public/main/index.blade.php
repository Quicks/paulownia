@extends('layouts.public')
@section('content')
    @include('public.main.slider')
    @include('public.main.slider-sale')

    @include('public.main.about-us')
    @include('public.main.vertical-slider')

     {{--<div style="height: 2200px"></div> --}}
    @include('public.main.advantages')
    @include('public.main.varieties')
    @include('public.main.calculate')
    @include('public.main.our-paulownia')
@endsection