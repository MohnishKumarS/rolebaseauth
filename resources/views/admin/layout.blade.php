<!DOCTYPE html>
<html>

<head>
    <base href="/public">
     {{--  css stylesheet  --}}
    @include('admin.config.css')
    @stack('styles')

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.config.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.config.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
             @yield('content')
        </div>
    </main>



    {{--  js script  --}}
    @include('admin.config.js')
    @stack('scripts')

</body>

</html>
