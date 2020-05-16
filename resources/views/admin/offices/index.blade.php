
@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.offices.index.title')
@endsection
                    
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/offices/create') }}" class="btn btn-success btn-sm pull-right" title="Add New news">
                                    <i class="fa fa-plus" aria-hidden="true"></i>@lang('admin.btns.new')
                                </a>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('admin.offices.index.table.name')</th>
                                        <th>@lang('admin.offices.index.table.postcode')</th>
                                        <th>@lang('admin.offices.index.table.phone')</th>
                                        <th>@lang('admin.offices.index.table.email')</th>
                                        <th>@lang('admin.offices.index.table.website')</th>
                                        <th>@lang('admin.offices.index.table.image')</th>
                                        <th>@lang('admin.offices.index.table.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($offices as $item)
                                <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->postcode }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><a target='_blank' rel='noopener noreferrer' href="{{ $item->website }}">{{ $item->website }}</a></td>
                                        <td>
                                            @foreach($item->images as $image)
                                                <img src="/storage/{{$image->getThumbnailAttribute()}}" class='img-thumbnail admin-thumbnail'/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('office.update'))
                                                <a href="{{ url('/admin/offices/' . $item->id . '/edit') }}" title="Edit partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('office.destroy'))
                                                <form method="POST" action="{{ url('/admin/offices' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $offices->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
