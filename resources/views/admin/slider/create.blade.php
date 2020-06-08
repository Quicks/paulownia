@extends('layouts.admin')

@section('pageTitle')
    @lang('admin.slider.create.title')
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
        <form method="POST" action="{{ route('slider.store') }}" class="form-horizontal validForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('admin.slider.form')
        </form>
    </div>
@endsection


