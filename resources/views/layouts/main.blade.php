<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('image/logo.webp')}}" type="image/x-icon">
    <!-- Primary Meta tags -->

    <!-- css -->
    @include('links.css')


    <!-- styles -->
    @stack('styles')

</head>

<body>

    <!-- navbar -->
    @include('common.navbar')

    <!-- content of the page -->
    <main class="page-wrapper">
        @yield('content')
    </main>




    <!-- js -->
    @include('links.js')


    <!-- add Scripts -->
    @stack('scripts')

</body>

</html>
