@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Article {{ $articles->id }}</div>
                    <div class="card-body">
                        <a href="{{ url(App::getLocale() .'/articles')}}" title="Back">
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
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $articles->id }}</td>
                                        </tr>
                                        <tr>
                                            <th> Name</th>
                                            <td> {{ $articles->name }} </td>
                                        </tr>
                                        <tr>
                                            <th> Active</th>
                                            <td> {{ $articles->active }} </td>
                                        </tr>
                                        <tr>
                                            <th> Publish Date</th>
                                            <td> {{ $articles->publish_date }} </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @empty(!($articles->translate($locale)->title))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Title ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right"
                                         @endif class="col-md-9"> {{ $articles->translate($locale)->title }} </div>
                                </div>
                            @endempty
                            @empty(!($articles->translate($locale)->text))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Text ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right"
                                         @endif  class="col-md-9">
                                        {!! $articles->translate($locale)->text !!}
                                    </div>
                                </div>
                            @endempty
                            @empty(!($articles->translate($locale)->keywords))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Keywords ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right"
                                         @endif class="col-md-9">
                                        {!! $articles->translate($locale)->keywords !!}
                                    </div>
                                </div>
                            @endempty

                            @foreach ($articles->images as $image)
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