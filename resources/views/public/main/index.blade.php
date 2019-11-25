@extends('layouts.public')
@section('content')
    @include('public.main.slider')
    @include('public.main.slider-sale')
    <div style="height: 2200px"></div>
    @include('public.main.advantages')
    @include('public.main.varieties')
    @include('public.main.calculate')
@endsection