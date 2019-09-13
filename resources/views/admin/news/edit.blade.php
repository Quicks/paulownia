@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Edit News #{{ $news->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>
                        <a href="{{ url('/admin/image_add/?imageable_id=' . $news->id . '&imageable_type=' . get_class($news) . '&redirect_route='.route('news.show', $news->id) )  }}"
                           title="Add Image">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                Add image
                            </button>
                        </a>
                        <br>
                        <br>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/news/' . $news->id) }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data" id="news-form">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.news.form', ['formMode' => 'edit'])

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
