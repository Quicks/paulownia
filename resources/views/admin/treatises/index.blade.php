@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Treatises</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/treatises/create') }}" class="btn btn-success btn-sm" title="Add New Treatise">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/treatises') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name</th><th>Active</th><th>Publish Date</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($treatises as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->active }}</td><td>{{ $item->publish_date }}</td>
                                        <td>
                                            <a href="{{ url('/admin/treatises/' . $item->id) }}" title="View Treatise"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/treatises/' . $item->id . '/edit') }}" title="Edit Treatise"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <a href="{{ url('/admin/file_add/?fileable_id=' . $item->id . '&fileable_type=' . get_class($item) . '&redirect_route='.route('treatises.show', $item->id) )  }}"
                                               title="Upload File">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-file-o" aria-hidden="true"></i>
                                                    Upload file
                                                </button>
                                            </a>

                                            <form method="POST" action="{{ url('/admin/treatises' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Treatise" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $treatises->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
