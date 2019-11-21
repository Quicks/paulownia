@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')
            @include('admin.aside-news')

            <div class="col">
                <div class="card">
                    <div class="card-header">News</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/news/create') }}" class="btn btn-success btn-sm" title="Add New News">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/news') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                @foreach($news as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->active }}</td><td>{{ $item->publish_date }}</td>
                                        <td>
                                            <a href="{{ url('/admin/news/' . $item->id) }}" title="View News"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                            @if(bouncer()->hasPermission('news.edit'))
                                                <a href="{{ url('/admin/news/' . $item->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                <a href="{{ url('/admin/image_add/?imageable_id=' . $item->id . '&imageable_type=' . get_class($item) . '&redirect_route='.route('news.show', $item->id) )  }}"
                                                   title="Add Image">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                        Add image
                                                    </button>
                                                </a>
                                            @endif
                                            @if(bouncer()->hasPermission('news.destroy'))
                                                <form method="POST" action="{{ url('/admin/news' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
