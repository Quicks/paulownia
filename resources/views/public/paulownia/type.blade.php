@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/types-of-paulownia.css')}}">
        <link rel="stylesheet" href="{{asset('css/about-paulownia.css')}}">
        <link rel="stylesheet" href="{{asset('css/our-products.css') }}?v7">
    @endpush


            <div class="row">
                <div class="col-12 border-up  p-sm-0">
                    @include('public.paulownia.nav-paulownia')

                    {{--<div class="row mt-3 mb-3 ml-2">--}}
                        {{--<div class="col-xl-2 col-md-0 col-sm-0"></div>--}}
                        {{--<div class="col-xl-6 col-md-12 col-sm-12 pl-4">--}}

                            {{--<a  @if(url()->current() === route('public.paulownia.about')) class="text-href p-xl-3 p-md-3 p-sm-0 tyro "--}}
                                {{--@else class="text-href p-xl-3 p-md-3 p-sm-0" @endif href="{{route('public.paulownia.about')}}">@lang('about-paulownia.about-paulownia')</a>--}}


                            {{--<a class="text-href p-xl-3 p-md-3 p-sm-1 " href="{{route('public.paulownia.type')}}">@lang('about-paulownia.types-of-paulownia')</a>--}}
                            {{--<a class="text-href p-xl-3 p-md-3 p-sm-0 " href="{{route('public.paulownia.planting')}}">@lang('about-paulownia.plantation-creation')</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xl-4 col-md-0 col-sm-0"></div>--}}
                    {{--</div>--}}
                </div>
                    <div class="col-12 fon-for-title-1 ">
                        <div class="row p-0 m-0 ">
                            <div class="col-xl-2 col-md-2 col-sm-0"></div>
                            <div class="col-9 mt-5 pt-5 mb-5 pb-5">
                                <div class="title-text mt-5 pt-5 ">@lang('about-paulownia.types-of-paulownia')</div>
                                <div class="text-under-title ">@lang('about-paulownia.text-1')
                                </div>
                                <div class="col-xl-1 col-md-1 col-sm-0"></div>
                            </div>
                        </div>
                    </div>
            </div>
        <div class="col-12 p-0 mx-auto justify-content-center fon-for-paulownia-type">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active margin-for-type pt-5 pb-5" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pao Tong</a>
            <a class="nav-item nav-link margin-for-type pt-5  pb-5 " id="nav-tong-2-tab" data-toggle="tab" href="#nav-tong-2" role="tab" aria-controls="nav-tong-2" aria-selected="false">Shan Tong</a>
            <a class="nav-item nav-link margin-for-type pt-5  pb-5 " id="nav-tong-3-tab" data-toggle="tab" href="#nav-tong-3" role="tab" aria-controls="nav-tong-3" aria-selected="false">Elongata</a>
            <a class="nav-item nav-link margin-for-type pt-5  pb-5 " id="nav-tong-4-tab" data-toggle="tab" href="#nav-tong-4" role="tab" aria-controls="nav-tong-4" aria-selected="false">Tomentosa</a>
            <a class="nav-item nav-link margin-for-type pt-5  pb-5 " id="nav-tong-5-tab" data-toggle="tab" href="#nav-tong-5" role="tab" aria-controls="nav-tong-5" aria-selected="false">Kawakamii</a>
            <a class="nav-item nav-link margin-for-type pt-5  pb-5 " id="nav-tong-6-tab" data-toggle="tab" href="#nav-tong-6" role="tab" aria-controls="nav-tong-6" aria-selected="false">Turbo Pro</a>
        </div>
            </nav>

        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="col-12 p-5 text-about-type">

                Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk; in 5 years after a technical cut,
                it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
                which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class,
                at which the landing is 6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree,
                good for growing in warm countries: Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa,
                is a very strong honey plant, thousands of flowers appear on its vast crown, which are to the taste of bees.
                Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.
                Thanks to its rapid growth, it is excellent for planting biofuels and quality wood. It is necessary to take into account the fact
                that for the cultivation of this species or its clones, lifting mechanisms and high stepladders will be required to improve the upper part
                of the trunk and crown.
                Therefore, on the one hand, we get a little more wood than other species, but we also have more work with trimming and forming the upper part of the trunk.

            </div>

            </div>
                <div class="tab-pane fade" id="nav-tong-2" role="tabpanel" aria-labelledby="nav-tong-2-tab">

                    <div class="col-12 p-5 text-about-type">

                        Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk; in 5 years after a technical cut,
                        it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
                        which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class,
                        at which the landing is 6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree,
                        good for growing in warm countries: Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa,
                        is a very strong honey plant, thousands of flowers appear on its vast crown, which are to the taste of bees.
                        Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.
                        Thanks to its rapid growth, it is excellent for planting biofuels and quality wood. It is necessary to take into account the fact
                        that for the cultivation of this species or its clones, lifting mechanisms and high stepladders will be required to improve the upper part
                        of the trunk and crown.
                        Therefore, on the one hand, we get a little more wood than other species, but we also have more work with trimming and forming the upper part of the trunk.

                    </div>

                </div>
                <div class="tab-pane fade" id="nav-tong-3" role="tabpanel" aria-labelledby="nav-tong-3-tab">

                    <div class="col-12 p-5 text-about-type">

                        Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk; in 5 years after a technical cut,
                        it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
                        which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class,
                        at which the landing is 6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree,
                        good for growing in warm countries: Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa,
                        is a very strong honey plant, thousands of flowers appear on its vast crown, which are to the taste of bees.
                        Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.
                        Thanks to its rapid growth, it is excellent for planting biofuels and quality wood. It is necessary to take into account the fact
                        that for the cultivation of this species or its clones, lifting mechanisms and high stepladders will be required to improve the upper part
                        of the trunk and crown.
                        Therefore, on the one hand, we get a little more wood than other species, but we also have more work with trimming and forming the upper part of the trunk.

                    </div>

                    .</div>
                <div class="tab-pane fade" id="nav-tong-4" role="tabpanel" aria-labelledby="nav-tong-4-tab">
                    <div class="col-12 p-5 text-about-type">

                        Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk; in 5 years after a technical cut,
                        it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
                        which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class,
                        at which the landing is 6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree,
                        good for growing in warm countries: Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa,
                        is a very strong honey plant, thousands of flowers appear on its vast crown, which are to the taste of bees.
                        Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.
                        Thanks to its rapid growth, it is excellent for planting biofuels and quality wood. It is necessary to take into account the fact
                        that for the cultivation of this species or its clones, lifting mechanisms and high stepladders will be required to improve the upper part
                        of the trunk and crown.
                        Therefore, on the one hand, we get a little more wood than other species, but we also have more work with trimming and forming the upper part of the trunk.

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tong-5" role="tabpanel" aria-labelledby="nav-tong-5-tab">
                    <div class="col-12 p-5 text-about-type">

                        Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk; in 5 years after a technical cut,
                        it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
                        which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class,
                        at which the landing is 6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree,
                        good for growing in warm countries: Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa,
                        is a very strong honey plant, thousands of flowers appear on its vast crown, which are to the taste of bees.
                        Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.
                        Thanks to its rapid growth, it is excellent for planting biofuels and quality wood. It is necessary to take into account the fact
                        that for the cultivation of this species or its clones, lifting mechanisms and high stepladders will be required to improve the upper part
                        of the trunk and crown.
                        Therefore, on the one hand, we get a little more wood than other species, but we also have more work with trimming and forming the upper part of the trunk.

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tong-6" role="tabpanel" aria-labelledby="nav-tong-6-tab">
                    <div class="col-12 p-5 text-about-type">

                        Paulownia Elongata (“Elongated”) is a fast-growing species with a straight and long trunk; in 5 years after a technical cut,
                        it has the necessary size for the industrialization of wood. The height of paulownia Elongata reaches 21m,
                        which is an order of magnitude greater than the previous varieties. The width of the crown belongs to the middle class,
                        at which the landing is 6m x 5m and 6m x 6m. Heat-loving, the Mediterranean climate is more suitable for this tree,
                        good for growing in warm countries: Italy, Spain, Croatia, North Africa, etc. Paulownia Elongata, along with Tomentosa,
                        is a very strong honey plant, thousands of flowers appear on its vast crown, which are to the taste of bees.
                        Beginning in 1970, China began to work on breeding various types of paulownia by crossing and planting in extreme conditions.
                        Thanks to its rapid growth, it is excellent for planting biofuels and quality wood. It is necessary to take into account the fact
                        that for the cultivation of this species or its clones, lifting mechanisms and high stepladders will be required to improve the upper part
                        of the trunk and crown.
                        Therefore, on the one hand, we get a little more wood than other species, but we also have more work with trimming and forming the upper part of the trunk.

                    </div>
                </div>
            </div>


        <div class="col-12 text-center">
            <div class="products-title-1 font-weight-bold text-center">@lang('about-paulownia.our-products')</div>
            <hr class="line-for-products-1">
        </div>

        <div class="col-12">

            <div class="row justify-content-center mx-1 products-animation animated">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-6 col-xs-12 position-relative one-product">
                        @include('public.products.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center p-5">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{route('public.products.index')}}">
                        <button class="product-button w-100">@lang('about-paulownia.all-goods')</button>
                    </a>
                </div>
            </div>

        </div>

    </div>

    </div>
@endsection