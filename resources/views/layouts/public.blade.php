<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEOMeta::generate() !!}
    @if(empty(SEOMeta::getTitle()))
        <title>{{ config('app.name', 'Laravel') }}</title>
@endif

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @stack('css')
</head>
<body>
<div id="app" class="container-fluid">
    @if (session('flash_message'))
        <div class="custom-status">
            <span class="custom-icon"></span>
            <p class="status-text"> {{ session('flash_message') }} </p>
        </div>
    @endif

        @include('public.header')
        
    <main>
        @yield('content')
    </main>

        @include('public.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

</body>
</html>
