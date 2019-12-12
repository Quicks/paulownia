@push('css')
    <link rel="stylesheet" href="{{asset('css/breadcrumbs.css') }}?v1">
@endpush

<div class="row">
    <div class="col-12 fon-text pl-5 pt-4">
        <a href="{{route('main')}}" class="fon-text">Main</a>/<a href="{{route('public.products.index')}}" class="fon-text">Goods</a>
    </div>
</div>