@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/partners.css') }}?v1">
    @endpush


    <div class="col-12 mb-5">@include('public.breadcrumbs',$breadcrumbs = [route('public.about-us.index') => 'header-footer.about us',
    route('public.partners.index') => 'about-us-header.our-partners'])</div>

    <div class="row fon-for-partners m-0">

        <div class="col-12 partners-background position-relative">
            <div>
                <img class="img-leaf lazyload position-absolute" data-src="{{asset('/images/service-leaf-tree.png')}}">
            </div>
            <div class="partner-text">@lang('about-us-header.our-partners')</div>
        </div>

            <div class="row mx-auto justify-content-center">
                @foreach($partners as $item)
                    <div class="col-xl-3 col-md-12 col-sm-12 text-center m-3 container-partners">
                        <a href="{{$item->website}}">
                            <img 
                                @if(!empty($item->images[0])) src="{{asset('storage/'.$item->images[0]->image)}}" 
                                @else src="{{asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png')}}"
                                @endif
                                class="lazyload img-partners" style="max-width:50%">
                        </a>
                    </div>
                @endforeach
            </div>
    </div>
@endsection
