@extends('layouts.admin')

@section('pageTitle')
    @lang('admin.galleries.create.title')
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
        <form method="POST" action="{{ url('/admin/galleries') }}" accept-charset="UTF-8"
                class="form-horizontal validForm" enctype="multipart/form-data" multiple='true'>
            {{ csrf_field() }}
            
            @include ('admin.galleries.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection
