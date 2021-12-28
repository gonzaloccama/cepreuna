<div class="container-fluid">
    @include('livewire.widgets.breadcrumb')
    <div class="row">

        <div class="col-md-3">
            <div class="card-box rounded-0 shadow">
                <img src="{{ asset('assets/images/logo/').'/'.$edit_logo_1st }}" alt="logo" class="img-fluid">
                <hr>
                <div class="font-italic text-center" style="font-size: 11px">
                    {{ \App\Http\dateSpanish($updated_at, 'withtime') }}
                </div>
                <hr>
                <div class="mail-list mt-0">
                    <a href="javascript:;" wire:click.prevent="general"
                       class="list-group-item rounded-0 mb-1 {{ $frame == 'index'?'active-left':'' }}">
                        <i class="mdi mdi-inbox font-18 align-middle mr-2"></i>General
                    </a>

                    <a href="javascript:;" wire:click.prevent="mediaSocial"
                       class="list-group-item rounded-0 mb-1 {{ $frame == 'media-social'?'active-left':'' }}">
                        <i class="mdi mdi-group font-18 align-middle mr-2"></i>Redes Sociales</a>


                    <a href="javascript:;" wire:click.prevent="logo"
                       class="list-group-item rounded-0 mb-1 {{ $frame == 'imgs'?'active-left':'' }}">
                        <i class="mdi mdi-arrange-send-backward font-18 align-middle mr-2"></i>Logo</a>

                    <a href="javascript:;" wire:click.prevent="missionAndVision"
                       class="list-group-item rounded-0 mb-1 {{ $frame == 'mission-and-vision'?'active-left':'' }}">
                        <i class="mdi mdi-ballot-outline font-18 align-middle mr-2"></i>Misión y Visión</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card-box rounded-0 shadow">
                <div class="card-widgets">

                    <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

                </div>
                <h4 class="header-title text-uppercase">{{ $title }}</h4>

                <hr>
                @include('livewire.admin.system-setting-component.'.$frame)
            </div>
        </div>

    </div><!-- End row -->

</div> <!-- container -->

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/switchery/switchery.min.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endpush

@push('scripts')

    <script src="{{ asset('assets/admin/libs/switchery/switchery.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            activeSelect2('#website_executive', 'website_executive');

            window.livewire.on('clearErrors', () => {
                $('.text-errors').text('');
            });

            window.livewire.on('refreshSection', () => {
                activeSelect2('#website_executive', 'website_executive');
                // activeCkeditor('#biography', 'biography');
            });

            window.livewire.on('refreshComponent', () => {
                $('[data-plugin="switchery"]').each(function (e) {
                    new Switchery($(this)[0], $(this).data())
                });

                activeSelect2('#website_executive', 'website_executive');
            });

            window.livewire.on('deleteAlert', () => {
                deleteSwal();
            });

            window.livewire.on('alertAdd', () => {
                notificationSwal('¡Se agregó exitosamente nuevo {{ $_title }}!', 'success');
            });

            window.livewire.on('alertUpdate', () => {
                notificationSwal('¡Se acualizó exitosamente las configuraciones!', 'success');
            });
        });


        function activeSelect2(sel, varModel) {
            $(sel).select2({
                theme: `material`,
                placeholder: "Seleccione...",
            });
            $(sel).on('change', function (e) {
            @this.set(varModel, e.target.value);
            });
        }

        function activeCkeditor(sel, varModel) {
            ClassicEditor
                .create(document.querySelector(sel))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set(varModel, editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endpush


