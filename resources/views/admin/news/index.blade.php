@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.news.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/news/create') }}" class="btn btn-success btn-sm pull-right" title="Add New news">
                                    <i class="fa fa-plus" aria-hidden="true"></i>@lang('admin.btns.new')
                                </a>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('admin.news.index.table.link_to_public')</th>
                                        <th>@lang('admin.news.index.table.publish')</th>
                                        <th>@lang('admin.news.index.table.publish_date')</th>
                                        <th>@lang('admin.news.index.table.images')</th>
                                        <th>@lang('admin.news.index.table.video')</th>
                                        <th>@lang('admin.news.index.table.langs')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $item)
                                <tr>
                                        <td><a target='_blank' href="/show/news/{{$item->id}}">{{ $item->title }}</a></td>
                                        <td>
                                            @if($item->active)
                                                @lang('admin.helpers.yes')
                                            @else
                                                @lang('admin.helpers.no')
                                            @endif
                                        </td>
                                        <td>{{ $item->publish_date }}</td>
                                        <td>
                                            @foreach($item->images as $image)
                                                <img src="/storage/{{$image->getThumbnailAttribute()}}" class='img-thumbnail admin-thumbnail'/>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href='{{$item->video}}' target='_blank' rel="noopener noreferrer">{{$item->video}}</a>
                                        </td>
                                        <td>
                                            @foreach($item->translations as $trans)
                                                @if(!empty($trans->title) && !empty($trans->text))
                                                    {{ $trans->locale }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('news.update'))
                                                <a href="{{ url('/admin/news/' . $item->id . '/edit') }}" title="Edit news"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('news.destroy'))
                                                <form method="POST" action="{{ url('/admin/news' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete news" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
