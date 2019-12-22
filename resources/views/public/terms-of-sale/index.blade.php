@extends('layouts.public')
@section('content')

    @include('public.breadcrumbs', $breadcrumbs = [route('public.terms-of-sale.index') => 'header-footer.goods' ])



@endsection