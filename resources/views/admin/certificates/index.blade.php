@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
             

            <div class="col">
                <div class="card">
                    <div class="card-header">Certificates</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/certificates/create') }}" class="btn btn-success btn-sm" title="Add New Certificate">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo
                        </a>

                        <form method="GET" action="{{ url('/admin/certificates') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name</th><th>Active</th><th>String1</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($certificates as $item)
                                    <tr @if($item->active) class="table-success" @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->active }}</td><td>{{ $item->string1 }}</td>
                                        <td>
                                            <a href="{{ url('/admin/certificates/' . $item->id) }}" title="View Certificate"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if(bouncer()->hasPermission('certificates.update'))
                                                <a href="{{ url('/admin/certificates/' . $item->id . '/edit') }}" title="Edit and Activate Certificate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit and Activate</button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('certificates.destroy'))
                                                <form method="POST" action="{{ url('/admin/certificates' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Certificate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $certificates->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
