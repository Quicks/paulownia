@extends('layouts.public')

@section('main_profitability_container')
	@include('public/main/profitability_container')
@endsection

@section('content')
    @include('public/main/slider', ['sliders' => $sliders])
    @include('public/main/promotions')
    @include('public/main/why_we')
    @include('public/main/bestsellers')
    @include('public/main/feedbacks', ['ourServices' => $ourServices])
    @include('public/main/our_sorts')
    @include('public/main/gallery')
    @include('public/main/news', ['news' => $news])
    @include('public/main/map')
@endsection
