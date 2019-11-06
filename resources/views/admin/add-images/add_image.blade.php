@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Add image</div>
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/image_save/'.$imageable_id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.add-images.add_image_form')

                            <div class="form-group text-right">
                                <input type="hidden" name="imageable_type" value="{{$imageable_type}}" />
                                <input type="hidden" name="redirect_route" value="{{$redirect_route}}" />
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
    <script src="{{ asset('js/admin-form-validator.js') }}"></script>
@endpush
