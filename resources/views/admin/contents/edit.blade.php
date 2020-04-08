@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
             
            @include('admin.aside-contents')

            <div class="col">
                <div class="card">
                    <div class="card-header">Edit Content #{{ $content->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/contents') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/contents/' . $content->id) }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.contents.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script src="{{ asset('js/admin-form-validator.js') }}"></script>
@endpush