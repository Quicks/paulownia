@extends('layouts.admin')

@section('pageTitle')
    @lang('admin.custom_pages.create.title')
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
        <form method="POST" action="{{ url('/admin/custom_pages') }}" accept-charset="UTF-8"
                class="form-horizontal validForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            @include ('admin.custom_pages.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection


