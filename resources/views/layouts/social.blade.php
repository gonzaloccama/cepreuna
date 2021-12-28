<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @stack('title') | Social | {{ config('app.name', 'CEPRE-UNAP') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/plugins/iconsmind-s/css/iconsminds.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/simple-line-icons/css/simple-line-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.css') }}"/>
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}"/>
    <!-- Bootstrap CSS -->
    {{--    <link rel="stylesheet" href="{{ asset('assets/social/css/bootstrap.min.css') }}"/>--}}
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/social/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/baguetteBox/baguetteBox.css') }}">

    {{--    <link href="{{ asset('assets/admin/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>--}}

    {{--    <meta name="theme-color" content="#00365A"/>--}}
    {{--    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/logo.png') }}">--}}
    {{--    <link rel="manifest" href="{{ asset('/manifest.json') }}">--}}

    @livewireStyles

    @stack('styles')


    <style>
        button.btn, .btn, .modal-content, .iq-card {
            border-radius: 0 !important;
        }

        input,
        textarea, select {
            border: 1px solid rgba(71, 71, 71, 0.32) !important;
        }

        input, textarea, label, select {
            border-radius: 0 !important;
        }

        input:focus, textarea:focus, select:focus {
            border: 1px solid rgb(13, 45, 98) !important;
            box-shadow: rgba(13, 45, 98, 0.32) 0px 0px 5px 0px !important;
        }

        .media-comment {
            padding: 0.6rem 10rem 0.6rem 0.8rem;
            line-height: 180%
        }

        .media-comment {
            resize: vertical;
            overflow: hidden;
        }

        .media-comment,
        .media-comment::after {
            padding: 0.6rem 10rem 0.6rem 0.8rem;
            line-height: 180%;
        }

        .media-comment:focus {
            box-shadow: rgba(13, 45, 98, 0.32) 0px 0px 5px 0px;
        }

        /*** tooltip ***/
        .tooltip-inner {
            background-color: #093d67;
            border-radius: 0;
            box-shadow: 0 0 5px 0 rgba(9, 61, 103, 0.73);
        }

        .bs-tooltip-auto[x-placement^=top] .arrow::before,
        .bs-tooltip-top .arrow::before {
            border-top-color: #093d67 !important;
        }

        .bs-tooltip-top .arrow::after {
            content: "";
            position: absolute;
            bottom: 0;
            border-width: 0 .4rem .4rem;
            transform: translateY(3px);
            border-color: transparent;
            border-style: solid;
            border-top-color: #093d67;
        }

        .total-like-block .dropdown .dropdown-menu, .total-comment-block .dropdown .dropdown-menu {
            background-color: rgba(9, 61, 103, 0.88);
            border-radius: 0;
        }

        @media (min-width: 768px) {
            .menu-social-color {
                color: white !important;
            }

            .menu-social-color:hover {
                color: #afdbf8 !important;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
            .menu-social-color {
                color: #014470 !important;
            }
        }


        @media (min-width: 320px) and (max-width: 480px) {
            .menu-social-color {
                color: #014470 !important;
            }
        }

        /*** scrollbar ***/
        body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar {
            width: 8px;
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #00365A;
        }


        /*** style profile user ***/
        .profile-user {
            font-family: "Rajdhani", sans-serif;
            font-size: 24px !important;
        }

        .info-social-user {
            font-family: "Rajdhani", sans-serif;
            font-size: 14px !important;
        }

        /*.media-support-info u, .media-support-info h5 a{*/
        /*    !*font-family: "roboto", sans-serif !important;*!*/
        /*    font-size: 19px !important;*/
        /*    font-weight: 600;*/
        /*}*/

        .media-support-info p u {
            font-family: "roboto", sans-serif !important;
            font-size: 14px !important;
        }

        .media-support-info p {
            font-size: 12px !important;
        }

        .text-danger.text-errors {
            font-family: "Rajdhani", sans-serif !important;
            font-weight: 500;
            font-size: 13px !important;
        }

        /*** tab profile user ***/
        /*.user-tabing .profile-feed-items {*/
        /*    overflow-x: auto !important;*/
        /*    overflow-y:hidden !important;*/
        /*    flex-wrap: nowrap !important;*/
        /*}*/
        /*.user-tabing .profile-feed-items li a {*/
        /*    white-space: nowrap !important;*/
        /*}*/


        /*** sweetalert2 ***/
        .swal2-popup {
            border-radius: 0 !important;
            box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.37);
        }

        .swal-notification {
            font-family: "Rajdhani", sans-serif !important;
            font-size: 16px !important;
            font-weight: 300;
        }

        .text-swal, .upload label, .font-rajdhani {
            font-family: "Rajdhani", sans-serif !important;
        }

        .roboto-normal {
            font-family: 'Roboto', sans-serif !important;
        }

        .roboto {
            font-family: 'Roboto', sans-serif !important;
            color: rgba(31, 31, 31, 0.8);
            text-shadow: 0 0 1px rgba(31, 31, 31, 0.60);
        }

        .roboto:hover {
            text-shadow: 0 0 1px rgba(0, 54, 90, 0.60);
        }

        .weight-400 {
            font-weight: 400;
        }

        .weight-300 {
            font-weight: 300;
        }

        .weight-500 {
            font-weight: 500;
        }

        .weight-600 {
            font-weight: 600;
        }

        .font-rajdhani-13, p.font-rajdhani-13 u {
            font-family: "Rajdhani", sans-serif !important;
            font-size: 13px !important;
        }

        .font-rajdhani-16 {
            font-family: "Rajdhani", sans-serif !important;
            font-size: 16px;
        }

        .font-rajdhani-18 {
            font-family: "Rajdhani", sans-serif !important;
            font-size: 18px;
        }

        /*** select2 ***/
        /*.form-control {*/
        /*    border:1px solid rgba(71, 71, 71, 0.32) !important;*/
        /*    border-radius: 0px;*/
        /*    box-shadow: none !important;*/
        /*    margin-bottom: 15px;*/
        /*}*/

        /*.form-control:focus {*/
        /*    border: 1px solid rgb(13, 45, 98) !important;*/
        /*}*/

        .select2.select2-container {
            width: 100% !important;
        }

        .select2.select2-container .select2-selection {
            border: 1px solid rgba(71, 71, 71, 0.32) !important;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            height: 45px;
            margin-bottom: 15px;
            outline: none !important;
            transition: all .15s ease-in-out;
        }

        .select2.select2-container .select2-selection:focus {
            border: 1px solid rgb(13, 45, 98) !important;
            box-shadow: rgba(13, 45, 98, 0.32) 0px 0px 5px 0px !important;
        }

        .select2.select2-container .select2-selection .select2-selection__rendered {
            color: rgba(71, 71, 71, 0.84);
            line-height: 45px;
            padding-right: 33px;
        }

        .select2.select2-container .select2-selection .select2-selection__arrow {
            background: #f8f8f8;
            border-left: 1px solid #ccc;
            -webkit-border-radius: 0 3px 3px 0;
            -moz-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
            height: 43px;
            width: 33px;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
            background: #f8f8f8;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
            -webkit-border-radius: 0 3px 0 0;
            -moz-border-radius: 0 3px 0 0;
            border-radius: 0 3px 0 0;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
            border: 1px solid #34495e;
        }

        .select2.select2-container .select2-selection--multiple {
            height: auto;
            min-height: 34px;
        }

        .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
            margin-top: 0;
            height: 32px;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
            display: block;
            padding: 0 4px;
            line-height: 29px;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__choice {
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            margin: 4px 4px 0 0;
            padding: 0 6px 0 22px;
            height: 24px;
            line-height: 24px;
            font-size: 12px;
            position: relative;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            margin: 0;
            text-align: center;
            color: #e74c3c;
            font-weight: bold;
            font-size: 16px;
        }

        .select2-container .select2-dropdown {
            background: transparent;
            border: none;
            margin-top: -5px;
        }

        .select2-container .select2-dropdown .select2-search {
            padding: 0;
        }

        .select2-container .select2-dropdown .select2-search input {
            outline: none !important;
            border: 1px solid #34495e !important;
            border-bottom: none !important;
            padding: 4px 6px !important;
        }

        .select2-container .select2-dropdown .select2-results {
            padding: 0;
        }

        .select2-container .select2-dropdown .select2-results ul {
            background: #fff;
            border: 1px solid #34495e;
        }

        .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
            background-color: #063554;
        }

        /*** form validation ***/

        .is-invalid, .is-invalid:focus {
            box-shadow: rgba(250, 52, 86, 0.12) 0px 0px 5px 0px !important;
            border: 1px solid rgb(250, 52, 86) !important;
        }

        /*** reactions group ***/

        .reaction {
            font-size: 1rem;
            display: inline-flex;
            width: 48px;
            height: 48px;
            color: #fff;
            border-radius: 50%;
            background-color: #ffffff;
            align-items: center;
            justify-content: center;
        }

        .reaction img {
            width: 100%;
            border-radius: 50%;
            padding: 3px;
        }

        .reaction-sm {
            font-size: .875rem;
            width: 30px;
            height: 30px;
        }

        .reaction-group .reaction {
            position: relative;
            z-index: 2;
            border: 1px dashed rgba(6, 53, 84, 0.34);
        }

        .reaction-group .reaction:hover {
            z-index: 3;
        }

        .reaction-group .reaction + .reaction {
            margin-left: -1rem;
        }
    </style>

</head>
<body class="right-column-fixed">
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper" style="background-color: rgba(0,54,90,0.03);">
@if(!isset($is_auth) && empty($is_auth))
    <!-- Sidebar  -->
    @include('layouts.social.sidebar')
    <!-- TOP Nav Bar -->
    @include('layouts.social.header')
    <!-- TOP Nav Bar END -->
        <!-- Right Sidebar Panel Start-->
    @include('layouts.social.sidebar-mini')
    <!-- Right Sidebar Panel End-->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            @endif


            {{ $slot }}


        </div>
        <!-- Wrapper END -->
        @if(!isset($is_auth) && empty($is_auth))
</div>
<!-- Footer -->
@include('layouts.social.footer')
<!-- Footer END -->
@endif
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>
{{--<script src="{{ asset('assets/social/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/social/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/social/js/bootstrap.min.js') }}"></script>--}}
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
<!-- am core JavaScript -->
<script src="{{ asset('assets/social/js/core.js') }}"></script>
<!-- am charts JavaScript -->
<script src="{{ asset('assets/social/js/charts.js') }}"></script>
<!-- am animated JavaScript -->
<script src="{{ asset('assets/social/js/animated.js') }}"></script>
<!-- am kelly JavaScript -->
<script src="{{ asset('assets/social/js/kelly.js') }}"></script>
<!-- am maps JavaScript -->
<script src="{{ asset('assets/social/js/maps.js') }}"></script>
<!-- am worldLow JavaScript -->
<script src="{{ asset('assets/social/js/worldLow.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/social/js/chart-custom.js') }}"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('assets/social/js/custom.js') }}"></script>

{{--<script src="{{ asset('assets/admin/libs/select2/select2.min.js') }}"></script>--}}

<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/baguetteBox/baguetteBox.js') }}"></script>


@livewireScripts

@stack('scripts')

<script type="text/javascript">
    // $(".media-comment").on('input', function() {
    //     var scroll_height = $(this).get(0).scrollHeight;
    //
    //     $(this).css('height', scroll_height + 'px');
    // });


    function notificationSwal(mssg, stl) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: `<div class="text-white swal-notification">${mssg}</div>`,
            background: stl,
            iconColor: '#efefef',
        })
    }

    function deleteSwal() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ml-3',
                cancelButton: 'btn btn-danger mr-3'
            },
            buttonsStyling: false,
            background: 'rgba(255,255,255,0.85)',
        })

        swalWithBootstrapButtons.fire({
            title: '<span class="text-swal">¿Estas seguro?</span>',
            html: '<span class="text-swal">¡No podrás revertir esto esta acción!</span>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminarlo!',
            cancelButtonText: 'No, Cancelar!',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emit('activeConfirm');

                swalWithBootstrapButtons.fire(
                    '<span class="text-swal">¡Eliminado!</span>',
                    '<span class="text-swal">El registro ha sido eliminado.</span> <i class="simple-icon-trash text-danger"></i>',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '<span class="text-swal">¡Cancelado!</span>',
                    '<span class="text-swal">Tu registro está a salvo</span> <i class="simple-icon-emotsmile text-primary"></i>',
                    'error'
                )
            }
        })
    }

    function lightbox(sel) {
        baguetteBox.run(sel, {
            animation: 'fadeIn',
            noScrollbars: true,
        });
    }
</script>

</body>
</html>
