<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>@stack('title') | Admin | {{ config('app.name', 'CEPRE-UNAP') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin CEPRE-UNAP" name="description"/>
    <meta content="CEPRE-UNAP" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/admin/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('assets/admin/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- App css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}"/>

    @livewireStyles

    @stack('styles')

    <style>
        /*/*/
        .badge-success-1 {
            border: 1px dashed #0c4128;
            background-color: rgba(10, 52, 32, 0.15);
            color: #0c4128;
            padding: 5px;
            margin: 0;
        }

        .badge-danger-1 {
            border: 1px dashed #60001a;
            background-color: rgba(164, 32, 44, 0.15);
            color: #60001a;
            padding: 5px;
            margin: 0;
        }

        .page-item {
            min-width: 35px;
        }

        /*/*/
        .swal2-popup {
            border-radius: 0 !important;
            box-shadow: 1px 1px 10px rgba(255, 255, 255, 0.37);
        }

        input, textarea, select, .select2-container, .btn, .card {
            border-radius: 0 !important;
        }

        input:focus, select:focus, .select2-container:focus, textarea:focus {
            border: 1px solid rgba(41, 52, 62, 0.68) !important;
        }

        #sidebar-menu .s-menu {
            background-image: linear-gradient(
                90deg, rgba(0, 54, 90, 0) 0%,
                rgb(0, 54, 90, 0.25) 30%,
                rgba(0, 54, 90, 0.25) 70%,
                rgba(0, 54, 90, 0) 100%
            );
        }

        .active-left {
            border: 1px solid rgba(0, 54, 90, 0.45) !important;
            font-weight: 700;
            color: #00365A !important;
            box-shadow: 0px 0px 5px 0px rgba(0, 54, 90, 0.18);
        }

        .card-box {
            border-radius: 0;
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.1);
        }

        /*** scrollbar ***/
        body::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar
        {
            width: 8px;
            background-color: #F5F5F5;
        }

        body::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #00365A;
        }

        .font-10 {
           font-size: 10px;
        }

        .ck.ck-editor__main,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline {
            min-height: 120px !important;
            max-height: 200px !important;
        }
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline::-webkit-scrollbar-track,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #b0b0b0;
            border-radius: 10px;
        }

        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline::-webkit-scrollbar,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline::-webkit-scrollbar {
            border-radius: 10px;
            width: 5px;
            height: 5px;
            background-color: #b0b0b0;
        }

        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline::-webkit-scrollbar-thumb,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #53575a;
        }
    </style>

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
@include('layouts.backend.header')
<!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
@include('layouts.backend.sidebar')
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            {{ $slot }}

        </div> <!-- content -->

        <!-- Footer Start -->
    @include('layouts.backend.footer')
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/select2/select2.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.js') }}"></script>


@livewireScripts

<script type="text/javascript">
    $(document).ready(function () {
        $('.list-unstyled .button-menu-mobile').on('click', function () {
            if ($('body').hasClass('enlarged'))
                $('.bg-sub-menu').removeClass('s-menu');
            else
                $('.bg-sub-menu').addClass('s-menu');
        });
    });

    function notificationSwal(mssg, stl) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: stl,
            title: mssg
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
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminarlo!',
            cancelButtonText: 'No, Cancelar!',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emit('activeConfirm');

                swalWithBootstrapButtons.fire(
                    '¡Eliminado!',
                    'El registro ha sido eliminado. <i class="far fa-dizzy text-danger"></i>',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '¡Cancelado!',
                    'Tu registro está a salvo <i class="far fa-smile-beam text-primary"></i>',
                    'error'
                )
            }
        })
    }
</script>

@stack('scripts')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>
</html>
