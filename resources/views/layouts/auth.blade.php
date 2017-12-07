<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Enrolment') }}</title>


    @include('main.includeHTML')
</head>
<body class="login-container">

@include('main.header')
<div class="page-container">
    <div class="page-content">
        @if (Route::has('login'))
            @auth
            @include('main.sidebar')
            @endauth
        @endif
        @yield('content')
    </div>
</div>
@yield('scripts')
</body>
</html>