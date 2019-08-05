@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit News #{{ $news->id }}</div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-10">

                                    <form method="POST" action="{{ url('/admin/news/' . $news->id) }}"
                                          accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"
                                          id="validForm">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        @include ('admin.news.form', ['formMode' => 'edit'])
                                    </form>

                                </div>

                                @include('admin.langPanel')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script src="{{ asset('js/admin-form-validate.js') }}"></script>
@endpush