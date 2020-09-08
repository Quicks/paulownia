@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.customers.edit.comment.title')
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
        <form method="POST" action="{{ url('/admin/customers/'.$customer->id) }}" accept-charset="UTF-8"
            class="form-horizontal validForm" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class='col-md-11'>
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
                            <label for="notes" class="control-label col-sm-3">@lang('admin.customers.edit.comment')</label>
                            <textarea class="form-control col-sm-6" name="notes" type="text" id="notes">{{ isset($customer->notes) ? $customer->notes : ''}}</textarea>
                            {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-1'>
                <div class='form-sidebar'>
                    <div>
                        <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
                    </div>
                    <div>
                        <a href="{{ url('/admin/customers') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection