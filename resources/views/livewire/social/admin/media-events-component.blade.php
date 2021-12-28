<div class="container-fluid">
    @include('livewire.widgets.breadcrumb')

    @include('livewire.social.admin.media-events-component.'.$frame)

</div> <!-- container -->

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/switchery/switchery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
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
                activeSelect2('#role', 'role');
                activeSelect2('#user_gender', 'user_gender');
                activeSelect2('#user_region', 'user_region');
                activeSelect2('#user_province', 'user_province');
                activeFlatpickr('#user_birthdate');
                activeCkeditor('#description', 'description');
            });

            window.livewire.on('refreshComponent', () => {
                $('[data-plugin="switchery"]').each(function (e) {
                    new Switchery($(this)[0], $(this).data())
                });

                activeSelect2('#role', 'role');
                activeSelect2('#user_gender', 'user_gender');
                activeSelect2('#user_region', 'user_region');
                activeSelect2('#user_province', 'user_province');
            });

            window.livewire.on('deleteAlert', () => {
                deleteSwal();
            });

            window.livewire.on('alertAdd', () => {
                notificationSwal('¡Se agregó exitosamente nuevo Usuario!', 'success');
            });

            window.livewire.on('alertUpdate', () => {
                notificationSwal('¡Se acualizó exitosamente el Usuario!', 'success');
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

        function activeFlatpickr(sel, is_time = 0) {
            $(sel).flatpickr({
                enableTime: !!is_time,
                dateFormat: `${is_time ? 'Y-m-d H:i' : 'Y-m-d'}`,
                disableMobile: "true",
                "locale": "es"
            });
        }
    </script>
@endpush




