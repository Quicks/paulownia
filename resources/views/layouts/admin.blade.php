

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- <link rel="stylesheet" href="{{ asset('vendor/webkul/admin/assets/css/admin.css') }}"> -->
    <link href="{{ asset('css/admin_custom.css') }}?v3" rel="stylesheet">

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 300;
            src: local('Raleway Light'), local('Raleway-Light'), url(https://fonts.gstatic.com/s/raleway/v14/1Ptrg8zYS_SKggPNwIYqWqhPAMif.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
            /* latin */
        @font-face {
            font-family: 'Raleway';
            font-style: normal;
            font-weight: 300;
            src: local('Raleway Light'), local('Raleway-Light'), url(https://fonts.gstatic.com/s/raleway/v14/1Ptrg8zYS_SKggPNwIYqWqZPAA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

    </style>


    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/css/custom-admin.css">
    <link rel="stylesheet" href="{{ asset('vendor/webkul/admin/assets/css/admin.css') }}">
    @stack('index_scripts')

    <!-- <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script> -->
    <script type="text/javascript" src="/js/admin.js"></script> 
    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
        
    </script>
    <script type="text/javascript">
        window.flashMessages = [];

        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }];
        @endif

        window.serverErrors = [];
        @if (isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>
    <script>
        var allLangArr = @json(config('translatable.locales'));
    </script>


</head>
    <body>
    <div id='sb-site'>

        <div id="app">

            @include('admin.header')
            @include('admin.sidebar')
            <div id="page-content-wrapper">
                <div id="page-content">
                    <div class="container">
                        <div id='page-title'>
                            <h2>@yield('pageTitle')</h2>
                        </div>
                        <div class="panel">
                            <div class='panel-body'>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stack('scripts')
<script>
    setTimeout(() => {
        $('#sidebar-menu').superclick({
            animation: {
                height: 'show'
            },
            animationOut: {
                height: 'hide'
            }
        })
    }, 1000);
    
</script>
</body>
</html>