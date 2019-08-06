@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add image to gallery "{{$gallery->name}}"</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/galleries') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/galleries/image_save/'.$gallery->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.galleries.add_image_form')
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Add image">
                            </div>

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
@endpush
