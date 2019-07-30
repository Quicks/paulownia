@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">

                {{--<div class="tab-content" id="v-pills-tabContent">--}}
                {{--<div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main">--}}

                <div class="card">
                    <div class="card-header">Edit News #{{ $news->id }}</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">

                                <div class="col-sm">
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <a href="{{ url('/admin/news') }}" title="Back">
                                                    <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                                              aria-hidden="true"></i>
                                                        Back
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                                    <input class="form-control" name="name" type="text" id="name"
                                                           value="{{ isset($news->name) ? $news->name : ''}}" required>
                                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <form method="POST" action="{{ url('/admin/news/' . $news->id) }}"
                                          accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        @include ('admin.news.form', ['formMode' => 'edit'])
                                    </form>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-header">Main Panel</div>


                                        <div class="card-body">



                                            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                                 aria-orientation="vertical">

                                                {{--<a class="nav-link" id="main" data-toggle="pill" href="#main" role="tab"--}}
                                                {{--aria-controls="main" aria-selected="false">Profile</a>--}}

                                                @foreach(config('translatable.locales') as $locale)
                                                    <br>
                                                    <a class="nav-link btn btn-outline-primary btn-sm" id={{$locale}} data-toggle="pill"
                                                       href="#{{$locale}}" role="tab"
                                                       aria-controls={{$locale}} aria-selected="false"> <label
                                                                for="{{$locale.'[title]'}}"
                                                                class="control-label">
                                                            {{ strtoupper($locale)}}
                                                        </label></a>
                                                @endforeach


                                            </div>


                                        </div>
                                    </div>
                                </div>
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

