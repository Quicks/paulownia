@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Partner {{ $partners->id }}</div>
                    <div class="card-body">
                        <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale() . '/partners')}}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back
                            </button>
                        </a>
                        <br/>
                        <br/>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="main-form" role="tabpanel"
                                 aria-labelledby="main-form">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr><th>ID</th><td>{{ $partners->id }}</td></tr>
                                        <tr><th> Name </th><td> {{ $partners->name }} </td></tr>
                                        <tr><th> Postcode </th><td> {{ $partners->postcode }} </td></tr>
                                        <tr><th> Phone </th><td> {{ $partners->phone }} </td></tr>
                                        <tr><th> Email </th><td> {{ $partners->email }} </td></tr>
                                        <tr><th> Website </th><td> {{ $partners->website }} </td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @empty(!($partners->translate($locale)->title))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Title ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{$partners->translate($locale)->title }} </div>
                                </div>
                            @endempty
                            @empty(!($partners->translate($locale)->address))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Address ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $partners->translate($locale)->address }} </div>
                                </div>
                            @endempty
                            @empty(!($partners->translate($locale)->city))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> City ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $partners->translate($locale)->city }} </div>
                                </div>
                            @endempty
                            @empty(!($partners->translate($locale)->country))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Country ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $partners->translate($locale)->country }} </div>
                                </div>
                            @endempty

                            @foreach ($partners->images as $image)
                                <div class="row m-1 pt-2 border-top border-dark">
                                    <div class="col-md-3 font-weight-bold"> Image {{$loop->iteration}} </div>
                                    <div class="col-md-9 text-center">
                                        <img class="img-thumbnail w-50"
                                             src="{{asset('storage/'.$image->image)}}">
                                    </div>
                                </div>
                                @empty(!($image->translate($locale)->title))
                                    <div class="row m-1 pt-2 border-top">
                                        <div class="col-md-3 font-weight-bold">
                                            Image title ({{$locale}})
                                        </div>
                                        <div @if($locale == 'ar') class="col-md-9 text-right"
                                             @endif class="col-md-9">
                                            {{$image->translate($locale)->title}}
                                        </div>
                                    </div>
                                @endempty
                                @empty(!($image->translate($locale)->desc))
                                    <div class="row m-1 pt-2 border-top">
                                        <div class="col-md-3 font-weight-bold">
                                            Image description ({{$locale}})
                                        </div>
                                        <div @if($locale == 'ar') class="col-md-9 text-right"
                                             @endif class="col-md-9">
                                            {!!$image->translate($locale)->desc!!}
                                        </div>
                                    </div>
                                @endempty
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection