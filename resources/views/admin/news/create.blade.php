
@extends('layouts.admin')

@section('pageTitle')
    @lang('admin.news.create.title')
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
        <form method="POST" action="{{ url('/admin/news') }}" accept-charset="UTF-8"
                class="form-horizontal validForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            @include ('admin.news.form', ['formMode' => 'create'])
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script src="{{ asset('js/admin-form-validator.js') }}"></script>
@endpush
