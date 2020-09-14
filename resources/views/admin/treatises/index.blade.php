@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.treatises.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/treatises/create') }}" class="btn btn-success btn-sm pull-right" title="Add New treatises">
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
                                        <th>@lang('admin.treatises.index.table.link_to_public')</th>
                                        <th>@lang('admin.treatises.index.table.publish')</th>
                                        <th>@lang('admin.treatises.index.table.publish_date')</th>
                                        <th>@lang('admin.treatises.index.table.langs')</th>
                                        <th>@lang('admin.treatises.index.table.files')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($treatises as $item)
                                <tr>
                                        <td><a target='_blank' href="/show/treatises/{{$item->id}}">{{ $item->title }}</a></td>
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
                                            <a href='{{$item->video}}' target='_blank' rel="noopener noreferrer">{{$item->video}}</a>
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('treatises.update'))
                                                <a href="{{ url('/admin/treatises/' . $item->id . '/edit') }}" title="Edit treatises"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('treatises.destroy'))
                                                <form method="POST" action="{{ url('/admin/treatises' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete treatises" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $treatises->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
