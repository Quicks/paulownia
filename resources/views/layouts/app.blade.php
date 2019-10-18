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
    <link href="{{asset('css/crud_custom.css')}}{{env('APP_ENV') != 'production' ? "?".now()->timestamp : ""}}" rel="stylesheet">
    {!! SEOMeta::generate() !!}
</head>
<body>
    <div id="app">
        @if (session('flash_message'))
            <div class="custom-status">
                <span class="custom-icon"></span>
                <p class="status-text"> {{ session('flash_message') }} </p>
            </div>
        @endif
        @include ('admin.nav_top')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var allLangArr = @json(config('translatable.locales'));
    </script>
    <script>
        $(document).ready(function () {
            setTimeout(function(){
                $('.custom-status').hide(100);
            }, 5000);

            $('.custom-icon').on('click', function () {
                $('.custom-status').remove()
            });
        });
    </script>
    @stack('scripts')
    
</body>
</html>
