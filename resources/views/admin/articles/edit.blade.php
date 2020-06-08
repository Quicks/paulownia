@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.article.edit.title')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
             
            <div class="card">
                <div class="card-body">
                    <!-- <a href="{{ url('/admin/image_add/?imageable_id=' . $article->id . '&imageable_type=' . get_class($article) . '&redirect_route='.route('articles.show', $article->id) )  }}"
                        title="Add Image">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            Add image
                        </button>
                    </a>
                    <br />
                    <br /> -->

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/articles/' . $article->id) }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.articles.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
            
        </div>
    </div>
@endsection


