@extends('layouts.public')
@section('content')
   @push('css')
      <link rel="stylesheet" href="{{asset('css/about-us-header.css') }}?v2">
   @endpush

    <div class="row fon-for-about-us-header m-0">
       <div class="col-12 "> @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.about us' ])</div>
        <div class="col-12 pl-5 pr-5 mt-5 text-about-us-header">Paulownia Professional is a manufacturer of seedlings,
            popular species of Paulownia. Our company has settled in Spain, the province of Aragon,
            whose production area is 2 hectares, which allows us to produce more than half
            a million seedlings per year. We offer an individual approach to each client,
            a large selection of advanced varieties of Pavlovia, which have come a long way in
            selection and adaptation and have yielded excellent results. We will also help you determine
            the variety that is most appropriate for your climatic zone (regardless of the extreme cold and hot heat),
            soil type, irrigation, industrial purpose of the plantation.
            <a href="#" class="read-m-about-header">Read more</a></div>
        <div class="col-12 title-our-service mt-5 text-center">Our service</div>

            <div class="row mx-auto pt-4">
                <div class=" col-xl-2 col-md-4 col-sm-6 card-img-width-about">
                    <div class="text-center"><img data-src="{{asset('/images/about-us-header-1.png')}}" class="lazyload"></div>
                    <div class="title-our-servise-about-us-header text-center">Sale</div>
                    <div class="text-our-servise-about-us-header text-center">seedlings and trees of Paulownia</div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6 card-img-width-about">
                    <div class="text-center"> <img data-src="{{asset('/images/about-us-header-2.png')}}" class="lazyload"></div>
                    <div class="title-our-servise-about-us-header text-center">Sale</div>
                    <div class="text-our-servise-about-us-header text-center">wood</div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                    <div class="text-center"><img data-src="{{asset('/images/about-us-header-3.png')}}" class="lazyload"></div>
                    <div class="title-our-servise-about-us-header text-center">Calculation </div>
                    <div class="text-our-servise-about-us-header text-center">profitability investment</div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                    <div class="text-center"><img data-src="{{asset('/images/about-us-header-4.png')}}" class="lazyload "></div>
                    <div class="title-our-servise-about-us-header text-center">Contracts</div>
                    <div class="text-our-servise-about-us-header text-center">for sale wood</div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                    <div class="text-center"><img data-src="{{asset('/images/about-us-header-5.png')}}" class="lazyload"></div>
                    <div class="title-our-servise-about-us-header text-center">Consultation </div>
                    <div class="text-our-servise-about-us-header text-center">throughout growing</div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6  card-img-width-about">
                    <div class="text-center"><img data-src="{{asset('/images/about-us-header-6.png')}}" class="lazyload "></div>
                    <div class="title-our-servise-about-us-header text-center">Projection</div>
                    <div class="text-our-servise-about-us-header text-center">future plantations</div>
                </div>
            </div>





        </div>





@endsection


