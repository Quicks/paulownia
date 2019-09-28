@extends('admin::layouts.content')

@section('page_title')
    Product {{$product->id}}
@stop
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link"
                       onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';">
                    </i>
                    Product #{{$product->id}}
                </h1>
            </div>
        </div>
        <div class="page-content">
            <div class="section-content-customers">
                @isset($product_imgs)
                    <div class="row">
                        @foreach($product_imgs as $item)
                            <img src="{{asset('cache/small/'.$item->path)}}">
                        @endforeach
                    </div>
                @endisset

                    @if(!empty($category))
                        <div class="row">
                            <span class="title-customers-view">
                                Category
                            </span>
                            <span class="value-customers-view">
                                {{$category}}
                            </span>
                        </div>
                    @endif

                @foreach($product_flat as $items)
                    @foreach($items as $key => $item)
                        <div class="row">
                            @if(!empty($key) && !empty($item))
                                <span class="title-customers-view">
                                    {{$key}}
                                </span>
                                <span class="value-customers-view">
                                    {!! $item !!}
                                </span>
                            @endif
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@stop
