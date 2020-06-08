@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.customers.customers.title') }}
@stop

    
@section('content')

    <div class="content" style="height: 100%;">
        
        {!! view_render_event('bagisto.admin.catalog.products.list.before') !!}

        <div class="page-content">
            @inject('products', 'Webkul\Admin\DataGrids\ProductDataGrid')
            {!! $products->render() !!}
        </div>

        {!! view_render_event('bagisto.admin.catalog.products.list.after') !!}

    </div>
<!-- 
    <modal id="downloadDataGrid" :is-open="modalIds.downloadDataGrid">
        <h3 slot="header">{{ __('admin::app.export.download') }}</h3>
        <div slot="body">
            <export-form></export-form>
        </div>
    </modal> -->
@stop

<!-- @push('scripts')
    @include('admin::export.export', ['gridName' => $products])
@endpush -->


