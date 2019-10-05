@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Images</div>
                    <div class="card-body">
                        <select onchange="window.location.href = this.value" class="custom-select">
                            <option @if(Request::getRequestUri() == "/admin/images") selected @endif value="/admin/images/">All</option>
                            @foreach($types as $type)
                                <option @if(Request::getRequestUri() =='/admin/images/?type=' . $type) selected @endif value="?type={{$type}}">{{substr($type, 11)}}</option>
                            @endforeach
                        </select>
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
                                                     src="{{asset('cache/small/'.$img->path)}}"
                                                     @else src="{{asset('storage/'.$img->thumbnail)}}" @endif>
                                            </td>
                                            @if($img->imageable_type == 'App\Models\Product')
                                            <td>
                                                <a href="{{asset('cache/medium/'.$img->path)}}" class="hyphenation" target="_blank">
                                                    {{asset('cache/medium/'.$img->path)}}
                                                </a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="{{asset('/storage/' . $img->image)}}" class="hyphenation" target="_blank">
                                                    {{asset('/storage/' . $img->image)}}
                                                </a>
                                            </td>
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
