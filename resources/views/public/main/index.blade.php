@extends('layouts.public')

@section('main_profitability_container')
	@include('public/main/profitability_container')
@endsection

@section('content')
    @include('public/main/slider-plant', [ 'sliderHeader' => __('products.plant-label') ])
    @include('public/main/slider-wood', ['sliderHeader' => __('products.wood-label')])
    
    {{--@include('public/main/promotions')--}}
    {{--@include('public/main/why_we')--}}
    {{--@include('public/main/bestsellers')--}}
    {{--@include('public/main/feedbacks', ['ourServices' => $ourServices])--}}
    @include('public/main/our_sorts')
    @include('public/main/news', ['news' => $news])
    @include('public/main/gallery') 
    @include('public/main/map')
@endsection
