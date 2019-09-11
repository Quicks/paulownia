@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Treatise {{ $treatise->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/treatises') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <a href="{{ url('/admin/treatises/' . $treatise->id . '/edit') }}" title="Edit Treatise">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Edit
                            </button>
                        </a>
                        <a href="{{ url('/admin/file_add/?fileable_id=' . $treatise->id . '&fileable_type=' . get_class($treatise) . '&redirect_route='.route('treatises.show', $treatise->id) )  }}"
                           title="Upload File">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Upload file
                            </button>
                        </a>

                        <form method="POST" action="{{ url('admin/treatises' . '/' . $treatise->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Treatise"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                             aria-hidden="true"></i>
                                Delete
                            </button>
                        </form>
                        <br/>
                        <br/>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr><th>ID</th><td>{{ $treatise->id }}</td></tr>
                                        <tr><th> Name</th><td> {{ $treatise->name }} </td></tr>
                                        <tr><th> Active</th><td> {{ $treatise->active }} </td></tr>
                                        <tr><th> Publish Date</th><td> {{ $treatise->publish_date }} </td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane fade" id="{{$locale}}" role="tabpanel"
                                     aria-labelledby="{{$locale}}">
                                    @isset($treatise->translate($locale)->title)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Title ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $treatise->translate($locale)->title }} </div>
                                        </div>
                                    @endisset
                                    @isset($treatise->translate($locale)->text)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Text ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                {!! $treatise->translate($locale)->text !!}
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($treatise->translate($locale)->keywords)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Keywords ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                {!! $treatise->translate($locale)->keywords !!}
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            @endforeach
                            @foreach ($treatise->files as $file)
                                <div class="row m-1 pt-2 border-top border-dark">
                                    <div class="col-md-3 font-weight-bold"> File {{$loop->iteration}} </div>
                                    <div  class="col-md-9 text-center">
                                        <a href="{{asset('storage/'.$file->file)}}" target="_blank">
                                            <h6> {{basename($file->file)}}</h6>
                                        </a>
                                    </div>
                                </div>
                                @foreach(config('translatable.locales') as $locale)
                                    <div class="tab-pane fade" id="{{$locale}}4" role="tabpanel"
                                         aria-labelledby="{{$locale}}">
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($file->translate($locale)->title)
                                                <div class="col-md-3 font-weight-bold">
                                                    File title ({{$locale}})
                                                </div>
                                                <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                    {{$file->translate($locale)->title}}
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($file->translate($locale)->desc)
                                                <div class="col-md-3 font-weight-bold">
                                                    File description ({{$locale}})
                                                </div>
                                                <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                    {!!$file->translate($locale)->desc!!}
                                                </div>
                                            @endisset
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection