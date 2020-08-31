@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.customers.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
{{--                                <div class="export-import" @click="showModal('downloadDataGrid')">--}}
{{--                                    <i class="export-icon"></i>--}}
{{--                                    <span>{{ __('admin::app.export.export') }}</span>--}}
{{--                                </div>--}}
                                <a href="{{ url('/admin/customers/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Сustomer">
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
                                        <th>@lang('admin.customers.index.table.first_name')</th>
                                        <th>@lang('admin.customers.index.table.email')</th>
                                        <th>@lang('admin.customers.index.table.date_of_birth')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $item)
                                <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->date_of_birth }}</td>
                                        <td>
                                            @if(bouncer()->hasPermission('customer.show'))
                                                <a href="{{ url('/admin/customers/' . $item->id) }}" title="Show customer">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('admin.btns.show')
                                                    </button>
                                                </a>
                                            @endif
                                            @if(bouncer()->hasPermission('customer.update'))
                                                <a href="{{ url('/admin/customers/' . $item->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('customer.comment'))
                                                <a href="{{ url('/admin/customers/' . $item->id . '/comment') }}" title="Comment customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.comment') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('customer.destroy'))
                                                <form method="POST" action="{{ url('/admin/customers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete customer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $customers->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
