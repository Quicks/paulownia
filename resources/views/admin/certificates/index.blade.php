@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.certificates.index.title')
@endsection
                    
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/certificates/create') }}" class="btn btn-success btn-sm pull-right" title="Add New news">
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
                                        <th>@lang('admin.certificates.index.table.name')</th>
                                        <th>@lang('admin.certificates.index.table.active')</th>
                                        <th>@lang('admin.certificates.index.table.string')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($certificates as $item)
                                <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if($item->active)
                                                @lang('admin.helpers.yes')
                                            @else
                                                @lang('admin.helpers.no')
                                            @endif
                                        </td>
                                        <td>{{ $item->string1 }}</td>
                                        <td>
                                            @if(bouncer()->hasPermission('certificate.update'))
                                                <a href="{{ url('/admin/certificates/' . $item->id . '/edit') }}" title="Edit partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('office.destroy'))
                                                <form method="POST" action="{{ url('/admin/certificates' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <div class="pagination-wrapper"> {!! $certificates->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
