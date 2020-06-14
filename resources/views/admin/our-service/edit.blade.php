@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.ourservice.edit.title')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
             
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/our-service/' . $ourService->id) }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.our-service.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
            
        </div>
    </div>
@endsection


