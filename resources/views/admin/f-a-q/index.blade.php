
@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.galleries.index.title')
@endsection
                    
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/f-a-q/create') }}" class="btn btn-success btn-sm pull-right" title="Add New news">
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
                                        <th>@lang('admin.faq.index.table.topic')</th>
                                        <th>@lang('admin.faq.index.table.question')</th>
                                        <!-- <th>@lang('admin.galleries.index.table.string')</th> -->
                                        <th>@lang('admin.faq.index.table.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($faqs as $item)
                                <tr>
                                    <td>{{html_entity_decode(strip_tags($item->content->text))}}</td>
                                    <td>{{ $item->question }}</td>
                                    <td>
                                        @if(bouncer()->hasPermission('faqs.update'))
                                            <a href="{{ url('/admin/f-a-q/' . $item->id . '/edit') }}" title="Edit partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                        @endif
                                        @if(bouncer()->hasPermission('office.destroy'))
                                            <form method="POST" action="{{ url('/admin/f-a-q' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.btns.destroy')</button>
                                            </form>
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $faqs->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
