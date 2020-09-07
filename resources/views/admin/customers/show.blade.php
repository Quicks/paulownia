@extends('layouts.admin')

@section('pageTitle')
    @lang('admin.customers.show.title')
@endsection
@section('content')
    <div class="card-body">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class='col-md-11'>
            <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
                <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
                    <div class="container-fluid d-flex flex-column">
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.first_name')</span>
                            <span class="form-control col-sm-6">{{ $customer->first_name }}</span>
                        </div>
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.last_name')</span>
                            <span class="form-control col-sm-6">{{ $customer->last_name }}</span>
                        </div>
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.email')</span>
                            <span class="form-control col-sm-6">{{ $customer->email }}</span>
                        </div>
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.gender')</span>
                            <span class="form-control col-sm-6">{{ $customer->gender }}</span>
                        </div>
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.status')</span>
                            <span class="form-control col-sm-6">
                                {{ $customer->status ? __('admin.customers.index.table.active') : __('admin.customers.index.table.inactive') }}
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.date_of_birth')</span>
                            <span class="form-control col-sm-6">{{ $customer->date_of_birth }}</span>
                        </div>
                        <div class="form-group">
                            <span class="control-label col-sm-3">@lang('admin.customers.index.table.phone')</span>
                            <span class="form-control col-sm-6">{{ $customer->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments">
                    @include ('admin.customers.comments.show-comment', ['customer' => $customer])
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders">
                    @include ('admin.customers.orders.show-order', ['customer' => $customer])
                </div>
            </div>
        </div>
        <div class='col-md-1'>
            <div class='form-sidebar'>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav-responsive nav nav-tabs">
                            <li class='active'>
                                <a class="nav-link btn btn-outline-primary btn-sm mb-2"
                                   id="main-form-btn" data-toggle="pill"
                                   href="#main-form" role="tab"
                                   aria-controls="main-form" aria-selected="true"
                                >
                                    @lang('admin.form.main')
                                </a>
                            </li>
                            <li>
                                <a class="nav-link btn btn-outline-primary btn-sm mb-2 mt-2"
                                   id="comments" data-toggle="pill"
                                   href="#comments" role="tab"
                                   aria-controls="comments" aria-selected="false"
                                >
                                @lang('admin.customers.show.comments')
                                </a>
                            </li>
                            <li>
                                <a class="nav-link btn btn-outline-primary btn-sm mb-2 mt-2"
                                   id="orders" data-toggle="pill"
                                   href="#orders" role="tab"
                                   aria-controls="orders" aria-selected="false"
                                >
                                @lang('admin.customers.show.orders')
                                </a>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ url('/admin/customers') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .d-flex {
        display: flex;
    }
    .flex-column {
        flex-direction: column;
    }
    .h-auto {
        height: auto!important;
    }
</style>