@extends('layouts.admin')
@section('pageTitle')
    Lista de articulo
@endsection
                    
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title">
                            <a href="{{ url('/admin/articles/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Article">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo
                            </a>

                            <form method="GET" action="{{ url('/admin/articles') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        
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
                                            <a href="{{ url('/admin/articles/' . $item->id) }}" title="View Article"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if(bouncer()->hasPermission('articles.update'))
                                                <a href="{{ url('/admin/articles/' . $item->id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                <a href="{{ url('/admin/image_add/?imageable_id=' . $item->id . '&imageable_type=' . get_class($item) . '&redirect_route='.route('articles.show', $item->id) )  }}"
                                                   title="Add Image">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                        Add image
                                                    </button>
                                                </a>
                                            @endif
                                            @if(bouncer()->hasPermission('articles.destroy'))
                                                <form method="POST" action="{{ url('/admin/articles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Article" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $articles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
