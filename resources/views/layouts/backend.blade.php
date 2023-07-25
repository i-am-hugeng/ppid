<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PPID Admin | @yield('title')</title>

    <link href="{{ asset('adminlte/dist/img/favicon.ico') }}" rel="icon">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!-- CSS Extention -->
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed dark-mode text-sm">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('bsn/bsn-logo-preloader.png') }}" alt="logo-bsn" width="300">
        </div>

        {{-- Navbar --}}
        @include('components.backend.navbar')

        {{-- Sidebar --}}
        @include('components.backend.sidebar')

        <div class="content-wrapper">

            @yield('content')

        </div>

        {{-- Footer --}}
        @include('components.backend.footer')

    </div>


    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Scripts Extention -->
    @yield('scripts')

    @include('sweetalert::alert')
</body>

</html>
