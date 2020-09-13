@extends('layouts.public')

@section('content')
    @include('public.breadcrumbs', [
        $breadcrumbs = [
        ],
        $pageTitle = 'header-footer.account'
    ])

    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')
        <h1>Account Index Page</h1>
    </div>
    
@endsection
