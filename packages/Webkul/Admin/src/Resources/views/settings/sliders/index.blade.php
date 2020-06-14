
@extends('layouts.admin')
@push('index_scripts')
    <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
@endpush
@section('pageTitle')
    @lang('admin.news.index.title')
@endsection
                
@section('content')
    <div class="content" style="height: 100%;"> 
        <div class="page-content">
            @inject('sliders','Webkul\Admin\DataGrids\SliderDataGrid')
            {!! $sliders->render() !!}
        </div>
    </div>
@stop

