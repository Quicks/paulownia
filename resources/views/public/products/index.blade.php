@extends('layouts.public')
@section('content')
    <style>
        .fon-text{
            padding-top: 0 !important;
        }
    </style>

    @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods' ])
    @include('public.products.filter')
@endsection
