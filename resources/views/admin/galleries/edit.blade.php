@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.galleries.edit.title')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
             
            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/galleries/' . $gallery->id) }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.galleries.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
            
        </div>
    </div>
@endsection


