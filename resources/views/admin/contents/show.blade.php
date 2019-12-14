@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col">
                <div class="card">
                    <div class="card-header">Content {{ $content->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/contents') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <a href="{{ url('/admin/contents/' . $content->id . '/edit') }}" title="Edit Content">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Edit
                            </button>
                        </a>

                        <form method="POST" action="{{ url('admin/contents' . '/' . $content->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Content"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                             aria-hidden="true"></i>
                                Delete
                            </button>
                        </form>
                        <br/>
                        <br/>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="main-form" role="tabpanel"
                                 aria-labelledby="main-form">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $content->id }}</td>
                                        </tr>
                                        <tr>
                                            <th> Name</th>
                                            <td> {{ $content->name }} </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane fade" id="{{$locale}}" role="tabpanel"
                                     aria-labelledby="{{$locale}}">
                                    @isset($content->translate($locale)->text)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Text ({{$locale}})</div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right"
                                                 @endif  class="col-md-9">
                                                {!! $content->translate($locale)->text !!}
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection
