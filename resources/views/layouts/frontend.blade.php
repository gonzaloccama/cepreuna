<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
@livewire('title-component')
{{--
   <!-- Start of Async Drift Code -->
   <script>
       "use strict";

       !function() {
           var t = window.driftt = window.drift = window.driftt || [];
           if (!t.init) {
               if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
               t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
                   t.factory = function(e) {
                       return function() {
                           var n = Array.prototype.slice.call(arguments);
                           return n.unshift(e), t.push(n), t;
                       };
                   }, t.methods.forEach(function(e) {
                   t[e] = t.factory(e);
               }), t.load = function(t) {
                   var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                   o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                   var i = document.getElementsByTagName("script")[0];
                   i.parentNode.insertBefore(o, i);
               };
           }
       }();
       drift.SNIPPET_VERSION = '0.3.1';
       drift.load('8fpw9x9xdkf4');
   </script>
   <!-- End of Async Drift Code -->
   ---}}

<!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6178d425f7c0440a59202ade/1fivvpdmb';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <meta name="robots" content="index, follow"/>
    <meta name="description"
          content="El CEPRE-UNA es una unidad operativa que brinda a los estudiantes una formación complementaria a la obtenida en el nivel secundario...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <meta name="google"
          content="El CEPRE-UNA es una unidad operativa que brinda a los estudiantes una formación complementaria a la obtenida en el nivel secundario...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
