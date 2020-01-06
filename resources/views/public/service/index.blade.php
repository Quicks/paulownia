@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/main-slider.css') }}?v9">
        <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    @endpush


    <div class="row fon-service m-0">

        <div class="col-12">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.servise' ])</div>

        <div class="col-12 text-service-title">Sale of seedlings and trees </div>

        <div class="col-12 p-0"><img data-src="{{asset('/images/line-for-main-slider.png')}}" class="lazyload line-img"></div>

        <div class="col-12 text-service">Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk;
            in 5 years after a technical cut, it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
            which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class, at which the landing is
            6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree, good for growing in warm countries:
            Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa, is a very strong honey plant, thousands of flowers appear
            on its vast crown, which are to the taste of bees.
            Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.</div>

    </div>



@endsection


