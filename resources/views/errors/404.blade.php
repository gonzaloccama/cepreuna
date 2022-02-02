<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>404 | {{ config('app.name', 'CEPRE-UNAP') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/social/images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/responsive.css') }}">
</head>
<body class="iq-bg-primary">
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-sm-12 text-center">
                <div class="iq-error position-relative mt-5">
                    <img src="{{ asset('assets/social/images/error/404.svg') }}" class="img-fluid iq-error-img" alt="" width="300">
{{--                    <h1 class="text-in-box">404</h1>--}}
                    <h2 class="mb-0">Oops! Esta página no se encuentra.</h2>
                    <p>La página solicitada no existe.</p>
                    <a class="btn btn-primary mt-3 rounded-0" href="{{ route('home') }}"><i class="ri-home-4-line"></i>Volver a la página de inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/social/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/social/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/social/js/bootstrap.min.js') }}"></script>
<!-- Appear JavaScript -->
<script src="{{ asset('assets/social/js/jquery.appear.js') }}"></script>
<!-- Countdown JavaScript -->
<script src="{{ asset('assets/social/js/countdown.min.js') }}"></script>
<!-- Counterup JavaScript -->
<script src="{{ asset('assets/social/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/social/js/jquery.counterup.min.js') }}"></script>
<!-- Wow JavaScript -->
<script src="{{ asset('assets/social/js/wow.min.js') }}"></script>
<!-- Apexcharts JavaScript -->
<script src="{{ asset('assets/social/js/apexcharts.js') }}"></script>
<!-- Slick JavaScript -->
<script src="{{ asset('assets/social/js/slick.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('assets/social/js/select2.min.js') }}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{ asset('assets/social/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{ asset('assets/social/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{ asset('assets/social/js/smooth-scrollbar.js') }}"></script>
<!-- lottie JavaScript -->
<script src="{{ asset('assets/social/js/lottie.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/social/js/chart-custom.js') }}"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('assets/social/js/custom.js') }}"></script>
</body>
</html>
