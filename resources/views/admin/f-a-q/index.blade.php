@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')
            @include('admin.aside-contents')

            <div class="col">
                <div class="card">
                    <div class="card-header">FAQ</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/f-a-q/create') }}" class="btn btn-success btn-sm" title="Add New FAQ">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/f-a-q') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Topic</th><th>Question</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($faq as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{html_entity_decode(strip_tags($item->content->text))}}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>
                                            <a href="{{ url('/admin/f-a-q/' . $item->id) }}" title="View FAQ"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/f-a-q/' . $item->id . '/edit') }}" title="Edit FAQ"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/f-a-q' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete FAQ" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $faq->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
