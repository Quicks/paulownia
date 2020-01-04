@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/products-price.css') }}?v2">
        <link rel="stylesheet" href="{{asset('css/partners.css') }}">
    @endpush

    <div class="col-12 mb-5">@include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.about us'])</div>

<div class="fon-for-partners">

            <div class="price-background">
                <div class="row">
                    <div class="col-12" style="height: 200px">
                        <div class="price-img-leaf-position">
                            <img class="price-img-leaf lazyload"
                                 data-src="{{asset('/images/service-leaf-tree.png')}}">
                        </div>
                        <div class="price-text mt-5">
                            {{--@lang('products.price-text')--}}
                            Our partners
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-auto justify-content-center">

                <div class="col-3 text-center m-3 container-partners ">
                    <img data-src="{{asset('/images/oxizonia-about-r.png')}}" class="lazyload img-partners" style="max-width: 20%">
                </div>

                <div class="col-3 text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/oUR-GREEN-COUNTRy.png')}}" class="lazyload img-partners" style="max-width:70%">
                </div>

                <div class="col-3 text-center  m-3  container-partners ">
                    <img data-src="{{asset('/images/logo_teruel_ruralvia 1.png')}}" class="lazyload img-partners" style="max-width:80%">
                </div>

                <div class="col-3 text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/suma_teruel_1.png')}}" class="lazyload img-partners" style="max-width:60%">
                </div>

                <div class="col-3 text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/layout_set_logo_1.png')}}" class="lazyload img-partners" style="max-width:80%">
                </div>

                <div class="col-3 text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/heart-tree.png')}}" class="lazyload img-partners" style="max-width:20%">
                </div>

                <div class="col-3 text-center  m-3 container-partners ">
                    <img data-src="{{asset('/images/Group-partners.png')}}" class="lazyload img-partners" style="max-width:40%">
                </div>

                <div class="col-3 text-center  m-3  container-partners ">
                    <img data-src="{{asset('/images/bajo-partners.png')}}" class="lazyload img-partners" style="max-width:60%">
                </div>

            </div>

    </div>

    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col">--}}
                {{--<div class="card-header">Partners</div>--}}
                {{--<div class="card-body">--}}
                    {{--<a href="{{ url('/') }}" title="Back">--}}
                        {{--<button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back--}}
                        {{--</button>--}}
                    {{--</a>--}}
                    {{--<br/>--}}
                    {{--<br/>--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>#</th><th>Name</th><th>Postcode</th><th>Phone</th><th>Email</th><th>Actions</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($partners as $item)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $loop->iteration }}</td>--}}
                                    {{--<td>{{ $item->name }}</td>--}}
                                    {{--<td>{{ $item->postcode }}</td>--}}
                                    {{--<td>{{ $item->phone }}</td>--}}
                                    {{--<td>{{ $item->email }}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{{ url(App::getLocale() . '/partners/' . $item->id)}}" title="View Partners">--}}
                                            {{--<button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
