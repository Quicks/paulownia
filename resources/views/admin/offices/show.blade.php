@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Office {{ $office->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/offices') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/offices/' . $office->id . '/edit') }}" title="Edit Office"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <a href="{{ url('/admin/image_add/?imageable_id=' . $office->id . '&imageable_type=' . get_class($office) . '&redirect_route='.route('offices.show', $office->id) )  }}"
                           title="Add Image">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                Add image
                            </button>
                        </a>
                        <form method="POST" action="{{ url('admin/offices' . '/' . $office->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Office" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr><th>ID</th><td>{{ $office->id }}</td></tr>
                                        <tr><th> Name </th><td> {{ $office->name }} </td></tr>
                                        <tr><th> Postcode </th><td> {{ $office->postcode }} </td></tr>
                                        <tr><th> Phone </th><td> {{ $office->phone }} </td></tr>
                                        <tr><th> Email </th><td> {{ $office->email }} </td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane fade" id="{{$locale}}" role="tabpanel"
                                     aria-labelledby="{{$locale}}">
                                    @isset($office->translate($locale)->title)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Title ({{$locale}})</div>
                                            <div class="col-md-9"> {{ $office->translate($locale)->title }} </div>
                                        </div>
                                    @endisset
                                    @isset($office->translate($locale)->address)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Address ({{$locale}})</div>
                                            <div class="col-md-9"> {{ $office->translate($locale)->address }} </div>
                                        </div>
                                    @endisset
                                    @isset($office->translate($locale)->city)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> City ({{$locale}})</div>
                                            <div class="col-md-9"> {{ $office->translate($locale)->city }} </div>
                                        </div>
                                    @endisset
                                    @isset($office->translate($locale)->country)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Country ({{$locale}})</div>
                                            <div class="col-md-9"> {{ $office->translate($locale)->country }} </div>
                                        </div>
                                    @endisset
                                </div>
                            @endforeach
                            @foreach ($office->images as $image)
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
                                                <div class="col-md-9">
                                                    {{$image->translate($locale)->title}}
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($image->translate($locale)->desc)
                                                <div class="col-md-3 font-weight-bold">
                                                    Image description ({{$locale}})
                                                </div>
                                                <div class="col-md-9">
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
