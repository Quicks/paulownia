@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">Edit News #{{ $news->id }}</div>
                    <div class="card-body">


                        <div class="container">
                            {{--<div class="row">--}}
                                {{--<div class="col-sm">--}}
                                    {{--<form method="POST" action="{{ url('/admin/news/' . $news->id) }}"--}}
                                          {{--accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">--}}
                                        {{--{{ method_field('PATCH') }}--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--@include ('admin.news.form', ['formMode' => 'edit'])--}}
                                    {{--</form>--}}
                                {{--<div class="col-sm">--}}
                                    {{--@include('admin.news.langPanel')--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}


                            <div class="d-flex flex-row justify-content-between">
                                <div class="p-2">

                                    <div class="col">
                                        <form method="POST" action="{{ url('/admin/news/' . $news->id) }}"
                                              accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            @include ('admin.news.form', ['formMode' => 'edit'])
                                        </form>
                                    </div>

                                </div>
                                <div class="p-2 ">

                                    <div class="col">
                                        @include('admin.news.langPanel')
                                    </div>

                                </div>

                            </div>



                        {{--<div class="container">--}}
                            {{--<div class="row" style="flex-direction: row">--}}
                                {{--<div class="col-8">--}}
                                    {{--<form method="POST" action="{{ url('/admin/news/' . $news->id) }}"--}}
                                          {{--accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">--}}
                                        {{--{{ method_field('PATCH') }}--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--@include ('admin.news.form', ['formMode' => 'edit'])--}}
                                    {{--</form>--}}
                                {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="col-3">--}}
                                   {{--@include('admin.news.langPanel')--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection


@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true
            });
        });
    </script>
@endpush

