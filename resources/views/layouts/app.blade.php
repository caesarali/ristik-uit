<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RISTIK | @yield('title')</title>
    <link href="{{ asset('assets/flat/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/flat/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/flat/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/flat/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/flat/css/main.css') }}" rel="stylesheet">
    @yield('style')
    <style type="text/css">
        #title {
            padding: 30px 0;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
</head>
<body style="min-height: 100vh">
    {{-- <div id="app"> --}}
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    {{-- </div> --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/flat/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/flat/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/flat/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('assets/flat/js/main.js') }}"></script>
    <script type="text/javascript">
        $("a[href='"+document.location+"']").parents('li').addClass('active')
    </script>
    @yield('scripts')
</body>
</html>
