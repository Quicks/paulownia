@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
             
              

            <div class="col">
                <div class="card">
                    <div class="card-header">News {{ $news->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/news') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button>
                        </a>

                        @if(bouncer()->hasPermission('news.edit'))
                            <a href="{{ url('/admin/news/' . $news->id . '/edit') }}" title="Edit News">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                            </a>
                            <a href="{{ url('/admin/image_add/?imageable_id=' . $news->id . '&imageable_type=' . get_class($news) . '&redirect_route='.route('news.show', $news->id) )  }}"
                               title="Add Image">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                    Add image
                                </button>
                            </a>
                        @endif

                        @if(bouncer()->hasPermission('news.destroy'))
                            <form method="POST" action="{{ url('admin/news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        @endif
                        <br/>
                        <br/>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr><th>ID</th><td>{{ $news->id }}</td></tr>
                                        <tr><th> Name</th><td> {{ $news->name }} </td></tr>
                                        <tr><th> Active</th><td> {{ $news->active }} </td></tr>
                                        <tr><th> Publish Date</th><td> {{ $news->publish_date }} </td></tr>
                                        <tr>
                                            <th> Video</th>
                                            <td>
                                                <iframe width="560" height="315"
                                                         src="{{ $news->video }}"
                                                         frameborder="0"
                                                         allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                         allowfullscreen></iframe>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane fade" id="{{$locale}}" role="tabpanel"
                                     aria-labelledby="{{$locale}}">
                                    @isset($news->translate($locale)->title)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Title ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9"> {{ $news->translate($locale)->title }} </div>
                                        </div>
                                    @endisset
                                    @isset($news->translate($locale)->text)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Text ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif  class="col-md-9">
                                                {!! $news->translate($locale)->text !!}
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($news->translate($locale)->keywords)
                                        <div class="row  m-1 pt-2 border-top">
                                            <div class="col-md-3 font-weight-bold"> Keywords ({{$locale}}) </div>
                                            <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                {!! $news->translate($locale)->keywords !!}
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            @endforeach
                            @foreach ($news->images as $image)
                                <div class="row m-1 pt-2 border-top border-dark">
                                    <div class="col-md-3 font-weight-bold"> Image {{$loop->iteration}} </div>
                                    <div class="col-md-9 text-center">
                                        <img class="img-thumbnail w-50"
                                             src="{{asset('storage/'.$image->image)}}">
                                    </div>
                                </div>
                                @foreach(config('translatable.locales') as $locale)
                                    <div class="tab-pane fade" id="{{$locale}}4" role="tabpanel"
                                         aria-labelledby="{{$locale}}">
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($image->translate($locale)->title)
                                                <div class="col-md-3 font-weight-bold">
                                                    Image title ({{$locale}})
                                                </div>
                                                <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                    {{$image->translate($locale)->title}}
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="row m-1 pt-2 border-top">
                                            @isset($image->translate($locale)->desc)
                                                <div class="col-md-3 font-weight-bold">
                                                    Image description ({{$locale}})
                                                </div>
                                                <div @if($locale == 'ar') class="col-md-9 text-right" @endif class="col-md-9">
                                                    {!!$image->translate($locale)->desc!!}
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






