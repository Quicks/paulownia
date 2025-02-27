@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card-header">Articles</div>
                <div class="card-body">
                    <a href="{{ url('/') }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back
                        </button>
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th><th>Name</th><th>Active</th><th>Publish Date</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->active }}</td>
                                    <td>{{ $item->publish_date }}</td>
                                    <td>
                                        <a href="{{ url(App::getLocale() .'/articles/' . $item->id)}}" title="View Articles">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
