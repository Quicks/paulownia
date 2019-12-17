@push('css')
    <link rel="stylesheet" href="{{asset('css/breadcrumbs-paulownia.css') }}?v1">
@endpush

<div>


    <div class="col-12 fon-text-paulownia pl-5 pt-4">
        <a href="{{route('main')}}" class="fon-text-paulownia">Main</a>/
        <a href="{{route('public.paulownia.index')}}" class="fon-text-paulownia">Paulownia </a>/
        <a href="{{route('public.paulownia.index')}}" class="fon-text-paulownia">About Paulownia</a>
    </div>


</div>