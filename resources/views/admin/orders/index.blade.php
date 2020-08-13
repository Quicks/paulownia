@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.orders.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('admin.orders.index.table.sub_total')</th>
                                        <th>@lang('admin.orders.index.table.grand_total')</th>
                                        <th>@lang('admin.orders.index.table.order_date')</th>
                                        <th>@lang('admin.orders.index.table.status')</th>
                                        <th>@lang('admin.orders.index.table.billed_to')</th>
                                        <th>@lang('admin.orders.index.table.payment_method')</th>
                                        <th>@lang('admin.orders.index.table.shiped_to')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                  <tr>
                                        <td>
                                            {{$item->base_sub_total}}
                                        </td>
                                        <td>
                                            {{$item->base_grand_total}}
                                        </td>
                                        <td>
                                            {{$item->created_at}}
                                        </td>
                                        <td>
                                            {{$item->status}}
                                        </td>
                                        <td>
                                            {{$item->billed_to}}
                                        </td>
                                        <td>
                                            {{$item->method}}
                                        </td>
                                        <td>
                                            {{$item->shipped_to}}
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('orders.show'))
                                                <a href="{{ url('/admin/orders/' . $item->id) }}" title="Show Order">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('admin.btns.show') 
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
