@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Gallery {{ $gallery->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/galleries') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/galleries/' . $gallery->id . '/edit') }}" title="Edit Gallery"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <a href="{{ url('/admin/galleries/image_add/' . $gallery->id ) }}" 
                            title="Add Image">
                            <button class="btn btn-warning btn-sm">
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

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $gallery->id }}</td></tr>
                                    <tr><th> Name </th><td> {{ $gallery->name }} </td></tr>
                                    <tr><th> Active </th><td> {{ $gallery->active }} </td></tr>
                                    @foreach ($gallery->images as $image)
                                        <tr>
                                            <th> Image {{$loop->iteration}} </th>
                                            <td>
                                                <img src="{{asset('storage/'.$image->image)}}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @foreach(config('translatable.locales') as $locale)
                                    <tbody class="bg-light">
                                        @isset($gallery->translate($locale)->title)
                                            <tr><th> Title ({{$locale}}) </th><td> {{ $gallery->translate($locale)->title }} </td></tr>
                                        @endisset
                                        @isset($gallery->translate($locale)->desc)
                                            <tr><th> Description ({{$locale}}) </th><td> {!! $gallery->translate($locale)->desc !!} </td></tr>
                                        @endisset
                                    </tbody>
                                    <tr class="m-4 p-4"><td></td><td></td></tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
