<!DOCTYPE html>
<html lang="es">
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
@livewire('title-component')
    <meta name="description"
          content="El CEPRE-UNA es una unidad operativa que brinda a los estudiantes una formación complementaria a la obtenida en el nivel secundario...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google"
          content="El CEPRE-UNA es una unidad operativa que brinda a los estudiantes una formación complementaria a la obtenida en el nivel secundario...">
    <meta name="keywords" content="cepreuna.edu.pe, CEPRE, CEPREUNA, CEPREUNAP, UNA, UNAP, Universidad Nacional del Altiplano, Academia, Puno"/>
{{--    <meta name="google-site-verification" content="googledf79e92c0288f019"/>--}}
    <meta name="robots" content="noindex,nofollow">
    <meta name="robots" content="index, follow"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/favicon.png') }}"/>

    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/iconsmind-s/css/iconsminds.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/simple-line-icons/css/simple-line-icons.css') }}"/>

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}">
    <!-- Plugin CSS (Plugins Files for only this Page) -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">

    @livewireStyles

    @stack('styles')

    @include('layouts.frontend.styles')

</head>

<body>

<div class="main-wrapper">

    <!-- Begin Main Header Area -->
@include('layouts.frontend.header')
<!-- Main Header Area End Here -->

{{ $slot }}

<!-- Begin Footer Area -->
@include('layouts.frontend.footer')
<!-- Footer Area End Here -->

    <!-- Begin Scroll To Top -->
    <a class="scroll-to-top" href="">
        <i class="ion-android-arrow-up"></i>
    </a>
    <!-- Scroll To Top End Here -->

</div>


<!-- Global Vendor, plugins JS -->

<!-- JS Files
============================================ -->
<!-- Global Vendor, plugins JS -->

<!-- Vendor JS -->
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery.waypoints.js') }}"></script>

<!--Plugins JS-->
<script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/tippy.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/mailchimp-ajax.js') }}"></script>

<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.counterup.js') }}"></script>

<!--Main JS (Common Activation Codes)-->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@livewireScripts

@stack('scripts')


</body>

</html>
