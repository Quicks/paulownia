@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Galleries</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/galleries/create') }}" class="btn btn-success btn-sm" title="Add New Gallery">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/galleries') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Active</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($galleries as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->active }}</td>
                                        <td>
                                            <a href="{{ url('/admin/galleries/' . $item->id) }}" title="View Gallery"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/galleries/' . $item->id . '/edit') }}" title="Edit Gallery"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <a href="{{ url('/admin/image_add/?imageable_id=' . $item->id . '&imageable_type=Gallery' . '&name=galleries' ) }}"
                                                title="Add Image">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                     Add image
                                                 </button>
                                            </a>

                                            <form method="POST" action="{{ url('/admin/galleries' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Gallery" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $galleries->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
