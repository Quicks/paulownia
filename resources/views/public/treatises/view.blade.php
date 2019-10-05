@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Treatise {{ $treatises->id }}</div>
                    <div class="card-body">
                        <a href="{{ url(App::getLocale() . '/treatises')}}" title="Back">
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
                                            <td>{{ $treatises->id }}</td>
                                        </tr>
                                        <tr>
                                            <th> Name</th>
                                            <td> {{ $treatises->name }} </td>
                                        </tr>
                                        <tr>
                                            <th> Active</th>
                                            <td> {{ $treatises->active }} </td>
                                        </tr>
                                        <tr>
                                            <th> Publish Date</th>
                                            <td> {{ $treatises->publish_date }} </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @empty(!($treatises->translate($locale)->title))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Title ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right"
                                         @endif class="col-md-9"> {{ $treatises->translate($locale)->title }} </div>
                                </div>
                            @endempty
                            @empty(!($treatises->translate($locale)->text))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Text ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right"
                                         @endif  class="col-md-9">
                                        {!! $treatises->translate($locale)->text !!}
                                    </div>
                                </div>
                            @endempty
                            @empty(!($treatises->translate($locale)->keywords))
                                <div class="row  m-1 pt-2 border-top">
                                    <div class="col-md-3 font-weight-bold"> Keywords ({{$locale}})</div>
                                    <div @if($locale == 'ar') class="col-md-9 text-right"
                                         @endif class="col-md-9">
                                        {!! $treatises->translate($locale)->keywords !!}
                                    </div>
                                </div>
                            @endempty
                            @foreach ($treatises->files as $file)
                                <div class="row m-1 pt-2 border-top border-dark">
                                    <div class="col-md-3 font-weight-bold"> File {{$loop->iteration}} </div>
                                    <div  class="col-md-9 text-center">
                                        <a href="{{asset('storage/'.$file->file)}}" target="_blank">
                                            <h6> {{basename($file->file)}}</h6>
                                        </a>
                                    </div>
                                </div>
                                @empty(!($file->translate($locale)->title))
                                    <div class="row m-1 pt-2 border-top">
                                        <div class="col-md-3 font-weight-bold">
                                            File title ({{$locale}})
                                        </div>
                                        <div @if($locale == 'ar') class="col-md-9 text-right"
                                             @endif class="col-md-9">
                                            {{$file->translate($locale)->title}}
                                        </div>
                                    </div>
                                @endempty
                                @empty(!($file->translate($locale)->desc))
                                    <div class="row m-1 pt-2 border-top">
                                        <div class="col-md-3 font-weight-bold">
                                            File description ({{$locale}})
                                        </div>
                                        <div @if($locale == 'ar') class="col-md-9 text-right"
                                             @endif class="col-md-9">
                                            {!!$file->translate($locale)->desc!!}
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