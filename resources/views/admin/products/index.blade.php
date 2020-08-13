@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.products.index.title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title row">
                            <div class='col-md-1 col-md-offset-11'>
                                <a href="{{ url('/admin/products/create') }}" class="btn btn-success btn-sm pull-right" title="Add New Article">
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
                                        <th>@lang('admin.product.index.table.link_to_public')</th>
                                        <th>@lang('admin.common.active')</th>
                                        <th>@lang('admin.common.images')</th>
                                        <th>@lang('admin.products.form.tabs.categories')</th>
                                        <th>@lang('admin.form.short_description')</th>
                                        <th>@lang('admin.btns.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>
                                            <a target='_blank' href="/products/{{$item->product_id}}">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            @if($item->status)
                                                @lang('admin.helpers.yes')
                                            @else
                                                @lang('admin.helpers.no')
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($item->productImages()->get()))
                                                @foreach($item->productImages()->get() as $image)
                                                    <img class='img-responsive' src="/storage/{{$image->getImageVersion('thumb')}}" alt="product_img1"/>
                                                @endforeach
                                            @else
                                                <img class='img-responsive' src="/images/banner-logo.png" alt="product_img1"/>
                                            @endif
                                        </td>
                                        <td>
                                            {{$item->product->categories->pluck('name')->implode(',')}}
                                        </td>
                                        <td>
                                            {!!$item->short_description!!}
                                        </td>
                                        <td>
                                            @if(bouncer()->hasPermission('products.update'))
                                                <a href="{{ url('/admin/products/' . $item->product_id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('admin.btns.edit') </button></a>
                                            @endif
                                            @if(bouncer()->hasPermission('products.destroy'))
                                                <form method="POST" action="{{ url('/admin/products' . '/' . $item->product_id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <div class="pagination-wrapper"> {!! $products->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
