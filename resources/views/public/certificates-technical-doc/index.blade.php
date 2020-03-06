@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/cert-tech-doc.css') }}">
    @endpush


    <div class="col-12 mb-5">@include('public.breadcrumbs',$breadcrumbs = [route('public.about-us.index') => 'header-footer.about us',
                route('public.certificates-technical-doc.index') => 'about-us-header.cert-tech-doc'])</div>

    <div class="row fon-for-partners m-0">
        <div class="col-12 partners-background position-relative">
            <div>
                <img class="img-leaf lazyload position-absolute" data-src="{{asset('/images/service-leaf-tree.png')}}">
            </div>
            <div class="partner-text">
                @lang('about-us-header.cert-tech-doc')
            </div>
        </div>

        <div class="row mx-auto">
            <div class="col-xl-3 col-md-12 col-sm-12 position-relative pl-xl-4">

                <a href="{{asset('/images/certificates/cert-long-1.png')}}" download>
                <div class="mt-3  text-md-center text-sm-center"><img data-src="{{asset('/images/cert-long-1.png')}}" class="lazyload img-cert-long "></div>
                </a>

                <a href="{{asset('/images/certificates/cert-long-2.png')}}" download>
                <div class="mt-3  text-md-center text-sm-center"><img data-src="{{asset('/images/cert-long-2.png')}}" class="lazyload img-cert-long "></div>
                </a>

                <a href="{{asset('/images/certificates/cert-long-3.png')}}" download>
                <div class="mt-3  text-md-center text-sm-center"><img data-src="{{asset('/images/cert-long-3.png')}}" class="lazyload img-cert-long "></div>
                </a>

            </div>


            <div class="col-xl-9 col-md-12 col-sm-12 ">

                <div class="row mt-3">

                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left tetext-md-center text-sm-center mb-3 " >
                        <a href="{{asset('/images/certificates/cert-small-1.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-1.png')}}" class="lazyload  img-cert-small">
                        </a>

                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center pl-xl-0" >
                        <a href="{{asset('/images/certificates/cert-small-2.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-2.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>

                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center pl-xl-0" >
                        <a href="{{asset('/images/certificates/cert-small-3.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-3.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center mb-3 " >
                        <a href="{{asset('/images/certificates/cert-small-4.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-4.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center pl-xl-0" >
                        <a href="{{asset('/images/certificates/cert-small-5.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-5.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center pl-xl-0" >
                        <a href="{{asset('/images/certificates/cert-small-6.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-6.png')}}" class="lazyload  img-cert-small">
                        </a></div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center mb-3 " >
                        <a href="{{asset('/images/certificates/cert-small-7.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-7.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center pl-xl-0" >
                        <a href="{{asset('/images/certificates/cert-small-1.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-8.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-12 col-sm-12 text-xl-left text-md-center text-sm-center pl-xl-0" >
                        <a href="{{asset('/images/certificates/cert-small-1.png')}}" download>
                            <img data-src="{{asset('/images/cert-small-9.png')}}" class="lazyload  img-cert-small">
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
