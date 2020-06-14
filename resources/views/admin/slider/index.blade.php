@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.slider.index.title')
@endsection
                    
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/slider/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Article">
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
                                      <th>@lang('admin.common.name')</th>
                                      <th>@lang('admin.slider.index.table.link')</th>
                                      <th>@lang('admin.common.text')</th>
                                      <th>@lang('admin.common.image')</th>
                                      <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>{{ $item->text }}</td>

                                        <td>
                                            @if(isset($item->image))
                                                <img src="/storage/{{$item->image->getThumbnailAttribute()}}" class='img-thumbnail admin-thumbnail'/>
                                            @endif
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('slider.update'))
                                                <a href="{{ url('/admin/slider/' . $item->id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('slider.destroy'))
                                                <form method="POST" action="{{ url('/admin/slider' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <div class="pagination-wrapper"> {!! $sliders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
