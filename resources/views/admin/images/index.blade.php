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
                            <option value="" selected disabled hidden>Filter</option>
                            <option value="/admin/images/">All</option>
                            @foreach($types as $type)
                                <option value="?type={{$type}}">{{substr($type, 11)}}</option>
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
                                                     src="{{asset('cache/medium/'.$img->path)}}"
                                                     @else src="{{asset('storage/'.$img->thumbnail)}}" @endif>
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
