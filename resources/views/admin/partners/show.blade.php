@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Partner {{ $partner->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/partners') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/partners/' . $partner->id . '/edit') }}" title="Edit Partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <a href="{{ url('/admin/image_add/?imageable_id=' . $partner->id . '&imageable_type=' . get_class($partner) . '&redirect_route='.route('partners.show', $partner->id) )  }}"
                           title="Add Image">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                Add image
                            </button>
                        </a>
                        <form method="POST" action="{{ url('admin/partners' . '/' . $partner->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr><th>ID</th><td>{{ $partner->id }}</td></tr>
                                        <tr><th> Name </th><td> {{ $partner->name }} </td></tr>
                                        <tr><th> Postcode </th><td> {{ $partner->postcode }} </td></tr>
                                        <tr><th> Phone </th><td> {{ $partner->phone }} </td></tr>
                                        <tr><th> Email </th><td> {{ $partner->email }} </td></tr>
                                        <tr><th> Website </th><td> {{ $partner->website }} </td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane fade" id="{{$locale}}" role="tabpanel"
                                     aria-labelledby="{{$locale}}">
                                    @isset($partner->translate($locale)->title)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Title ({{$locale}})</div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{$partner->translate($locale)->title }} </div>
                                        </div>
                                    @endisset
                                    @isset($partner->translate($locale)->address)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Address ({{$locale}})</div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $partner->translate($locale)->address }} </div>
                                        </div>
                                    @endisset
                                    @isset($partner->translate($locale)->city)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> City ({{$locale}})</div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $partner->translate($locale)->city }} </div>
                                        </div>
                                    @endisset
                                    @isset($partner->translate($locale)->country)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Country ({{$locale}})</div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $partner->translate($locale)->country }} </div>
                                        </div>
                                    @endisset
                                </div>
                            @endforeach
                            @foreach ($partner->images as $image)
                                <div class="row m-1 pt-2 border-top border-dark">
                                    <div class="col-md-3 font-weight-bold"> Image {{$loop->iteration}} </div>
                                    <div class="col-md-9 text-center">
                                        <img class="img-thumbnail w-50"
                                             src="{{asset('storage/'.$image->image)}}">
                                    </div>
                                </div>
                                @foreach(config('translatable.locales') as $locale)
                                    <div class="tab-pane fade" id="{{$locale}}4" role="tabpanel"
                                         aria-labelledby="{{$locale}}">
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($image->translate($locale)->title)
                                                <div class="col-md-3 font-weight-bold">
                                                    Image title ({{$locale}})
                                                </div>
                                                <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                    {{$image->translate($locale)->title}}
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($image->translate($locale)->desc)
                                                <div class="col-md-3 font-weight-bold">
                                                    Image description ({{$locale}})
                                                </div>
                                                <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                    {!!$image->translate($locale)->desc!!}
                                                </div>
                                            @endisset
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection
