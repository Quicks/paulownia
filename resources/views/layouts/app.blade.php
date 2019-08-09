<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('css/crud_custom.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if (session('status'))
            <div class="custom-status">
                <span class="custom-icon"></span>
                <p class="status-text"> {{ session('status') }} </p>
            </div>
        @endif
        @include ('layouts.nav_top')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var allLangArr = {!!json_encode(config('translatable.locales'))!!};
    </script>
    <script>
        $(document).ready(function () {
            $('.custom-icon').on('click', function () {
                $('.custom-status').remove()
            });
        });
    </script>
    @stack('scripts')
    
</body>
</html>
