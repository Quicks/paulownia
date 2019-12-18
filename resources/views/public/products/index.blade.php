@extends('layouts.public')
@section('content')
    @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.goods' ])
    @include('public.products.filter')
@endsection
