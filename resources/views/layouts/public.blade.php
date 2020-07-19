<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153098530-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-153098530-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- SEOMeta -->
    {!! SEOMeta::generate() !!}
    @if(empty(SEOMeta::getTitle()))
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif
    
<!-- Google ReCAPTCHA v2 -->
    {!! htmlScriptTagJsApi() !!}

<!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('images/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v9">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script type="text/javascript">
        window.flashMessages = [];
        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }];
        @endif

        window.serverErrors = [];
        @if (count($errors))
            window.serverErrors = @json($errors->getMessages());
        @endif
    </script>
    @stack('css')

</head>
<body>

<div id="app" class="container-fluid p-0">
    @if (session('success') || session('warning') || session('error') || session('info'))
        <div id="flash-message" class="custom-status">
            <span class="custom-icon" onclick="$('#flash-message').remove()"></span>
            <p class="status-text"> {!! session('success').session('warning').session('error').session('info') !!} </p>
        </div>
    @endif
    @include('public/blocks/preloader')
    @include('public/blocks/header')
    <main class="main-background">
        @yield('content')
    </main>
    @include('public/blocks/footer')


</div>
@include('cookieConsent::index')

@stack('scripts')

</body>
</html>
