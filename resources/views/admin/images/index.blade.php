@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Images</div>
                    <div class="card-body">
                        <button class="btn btn-info btn-sm dropdown dropdown-toggle float-right" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Filter
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
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th><th>Images</th><th>URL</th><th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($images as $img)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img width="100px" height="100px"
                                                     @if($img->imageable_type == 'App\Models\Product')
                                                     src="{{asset('cache/medium/'.$img->path)}}"
                                                     @endif src="{{asset('storage/'.$img->image)}}">
                                            </td>
                                            @if($img->imageable_type == 'App\Models\Product')
                                            <td>{{asset('cache/medium/'.$img->path)}}</td>
                                            @else
                                            <td> {{asset('/storage/' . $img->image)}}</td>
                                            @endif
                                            <td>{{substr($img->imageable_type, 11)}}</td>
                                        </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
