<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- <link rel="stylesheet" href="{{asset('asset/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/util.css')}}">




    @yield('head')
</head>
<body>

    {{-- @include('includes.header') --}}

    @yield('content')

    {{-- @include('includes.foote') --}}

    {{-- jquary --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script>
        @yield('script')
</script>
</body>
</html>
