<div class="container-fluid">

    @include('livewire.widgets.breadcrumb')


    @include('livewire.admin.cycle-component.'.$frame)


</div> <!-- container -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/switchery/switchery.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/es.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/switchery/switchery.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('clearErrors', () => {
                $('.text-errors').text('');
            });

            window.livewire.on('refreshSection', () => {
                activeCkeditor('#price', 'price');
                activeCkeditor('#horary', 'horary');

                activeFlatpickr('#start_register', 1);
                activeFlatpickr('#finish_register', 1);

                activeFlatpickr('#start_class');
                activeFlatpickr('#finish_class');
            });

            window.livewire.on('refreshComponent', () => {
                $('[data-plugin="switchery"]').each(function (e) {
                    new Switchery($(this)[0], $(this).data())
                });
            });

            window.livewire.on('deleteAlert', () => {
                deleteSwal();
            });

            window.livewire.on('alertAdd', () => {
                notificationSwal('¡Se agregó exitosamente nuevo {{ $_title }}!', 'success');
            });

            window.livewire.on('alertUpdate', () => {
                notificationSwal('¡Se acualizó exitosamente el {{ $_title }}!', 'success');
            });
        });

        function activeFlatpickr(sel, is_time = 0) {
            $(sel).flatpickr({
                enableTime: !!is_time,
                dateFormat: `${is_time ? 'Y-m-d H:i' : 'Y-m-d'}`,
                disableMobile: "true",
                "locale": "es"
            });
        }

        function activeCkeditor(sel, varModel) {
            ClassicEditor
                .create(document.querySelector(sel))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.
                        set(varModel, editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endpush
