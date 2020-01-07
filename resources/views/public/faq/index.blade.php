@extends('layouts.public')
@section('content')

    <div class="row m-0 p-0 ">

        <div class="col-12">@include('public.breadcrumbs', $breadcrumbs = [route('public.faq.index') => 'header-footer.about us' ])</div>

    </div>



@endsection
