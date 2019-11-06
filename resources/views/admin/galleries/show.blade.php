@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Gallery {{ $gallery->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/galleries') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/galleries/' . $gallery->id . '/edit') }}" title="Edit Gallery"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <a href="{{ url('/admin/image_add/?imageable_id=' . $gallery->id . '&imageable_type=' . get_class($gallery) . '&redirect_route='.route('galleries.show', $gallery->id) ) }}"
                            title="Add Image">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                 Add image
                             </button>
                        </a>
                        <form method="POST" action="{{ url('admin/galleries' . '/' . $gallery->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Gallery" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="table-responsive tab-pane fade show active" id="main-form" 
                                role="tabpanel" aria-labelledby="main-form">
                                <table class="table">
                                    <tbody>
                                        <tr><th>ID</th><td>{{ $gallery->id }}</td></tr>
                                        <tr><th> Name </th><td> {{ $gallery->name }} </td></tr>
                                        <tr><th> Active </th><td> {{ $gallery->active }} </td></tr>
                                    </tbody>
                                </table>
                            </div>

                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane fade" id="{{$locale}}" role="tabpanel" 
                                    aria-labelledby="{{$locale}}">
                                    @isset($gallery->translate($locale)->title)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Title ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $gallery->translate($locale)->title }} </div>
                                        </div>
                                    @endisset
                                    @isset($gallery->translate($locale)->desc)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Description ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                {!! $gallery->translate($locale)->desc !!} 
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($gallery->translate($locale)->keywords)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Keywords ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                {!! $gallery->translate($locale)->keywords !!}
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            @endforeach

                            @foreach ($gallery->images as $image)
                                <div class="row m-1 pt-2 border-top border-dark">
                                    <div class="col-md-3 font-weight-bold"> Image {{$loop->iteration}} </div>
                                    <div class="col-md-9 text-center">
                                        <img class="img-thumbnail w-50" 
                                            src="{{asset('storage/'.$image->image)}}">
                                    </div>
                                </div>
                                @foreach(config('translatable.locales') as $locale)
                                    <div class="tab-pane fade" id="{{$locale}}1" role="tabpanel" 
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
