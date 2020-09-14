@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.article.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/articles/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Article">
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
                                        <th>@lang('admin.article.index.table.link_to_public')</th>
                                        <th>@lang('admin.article.index.table.publish')</th>
                                        <th>@lang('admin.article.index.table.publish_date')</th>
                                        <th>@lang('admin.article.index.table.langs')</th>
                                        <th>@lang('admin.article.index.table.images')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $item)
                                    <tr>
                                        <td><a target='_blank' href="/show/article/{{$item->id}}">{{ $item->title }}</a></td>
                                        <td>
                                            @if($item->active)
                                                @lang('admin.helpers.yes')
                                            @else
                                                @lang('admin.helpers.no')
                                            @endif
                                        </td>
                                        <td>{{ $item->publish_date }}</td>
                                        <td>
                                            @foreach($item->translations as $trans)
                                                @if(!empty($trans->title) && !empty($trans->text))
                                                    {{ $trans->locale }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($item->images as $image)
                                                <img src="/storage/{{$image->getThumbnailAttribute()}}" class='img-thumbnail admin-thumbnail'/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('articles.update'))
                                                <a href="{{ url('/admin/articles/' . $item->id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('articles.destroy'))
                                                <form method="POST" action="{{ url('/admin/articles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Article" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $articles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
