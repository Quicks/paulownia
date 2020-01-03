@extends('layouts.public')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card-header">Partners</div>
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
                                <th>#</th><th>Name</th><th>Postcode</th><th>Phone</th><th>Email</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partners as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->postcode }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url(App::getLocale() . '/partners/' . $item->id)}}" title="View Partners">
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
