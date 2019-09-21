@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Images</div>
                    <div class="card-body">
                        <button class="btn btn-info btn-sm dropdown dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Type
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                               href="{{ asset('/admin/images/')}}">
                                All
                            </a>
                            @foreach($types as $type)
                                <a class="dropdown-item"
                                   href="{{ asset('/admin/images/?type=') . $type}}">
                                    {{substr($type, 11)}}
                                </a>
                            @endforeach
                        </div>
                        <hr>
                        <div class="col text-center">
                            @foreach($images as $img)
                                <button type="button"
                                        data-toggle="modal"
                                        data-target="#exampleModal{{$loop->iteration}}"
                                        class="img-thumbnail"
                                        style="margin: 2px">
                                    <img width="150px" height="150px"
                                        @if($img->imageable_type == 'App\Models\Product')
                                        src="{{asset('cache/medium/'.$img->image)}}"
                                        @endif
                                        src="{{asset('storage/'.$img->image)}}">
                                </button>
                                <div class="modal fade" id="exampleModal{{$loop->iteration}}" tabindex="-1"
                                     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image {{$img->id}}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <th>Type</th>
                                                            <td>{{substr($img->imageable_type, 11)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{substr($img->imageable_type, 11) . ' Id'}}</th>
                                                            @if($img->imageable_type == 'App\Models\Product')
                                                                <td>{{$img->product_id}}</td>
                                                            @endif
                                                                <td>{{$img->imageable_id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th> URL</th>
                                                            @if($img->imageable_type == 'App\Models\Product')
                                                                <td>{{asset('cache/medium/'.$img->path)}}</td>
                                                            @else
                                                                <td> {{asset('/storage/' . $img->image)}}</td>
                                                            @endif
                                                        </tr>
                                                        @if($img->imageable_type != 'App\Models\Product')
                                                        <tr>
                                                            <th> Created</th>
                                                            <td> {{$img->created_at}}</td>
                                                        </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
