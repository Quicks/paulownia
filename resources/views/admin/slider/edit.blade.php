@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.slider.edit.title')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
             
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/slider/' . $slider->id) }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.slider.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script src="{{ asset('js/admin-form-validator.js') }}"></script>
@endpush
