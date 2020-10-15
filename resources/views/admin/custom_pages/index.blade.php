@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.custom_pages.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/custom_pages/create') }}" class="btn btn-success btn-sm pull-right" title="Add New CustomPage">
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
                                        <th>@lang('admin.article.index.table.langs')</th>
                                        <th>@lang('admin.custom_pages.index.table.parent_link')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($custom_pages as $item)
                                    <tr>
                                        <td><a target='_blank' href="/{{$item->link}}">{{ $item->link }}</a></td>
                                        <td>
                                            @foreach($item->translations as $trans)
                                                @if(!empty(trim($trans->description)))
                                                    {{ $trans->locale }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->parentLink() }}</td>

                                        <td>
                                            @if(bouncer()->hasPermission('custom_pages.update'))
                                                <a href="{{ url('/admin/custom_pages/' . $item->id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('custom_pages.destroy'))
                                                <form method="POST" action="{{ url('/admin/custom_pages' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Custom Page" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $custom_pages->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
