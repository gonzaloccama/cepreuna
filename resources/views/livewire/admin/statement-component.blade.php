<div class="container-fluid">
    @include('livewire.widgets.breadcrumb')
    @include('livewire.admin.statement-component.'.$frame)
</div> <!-- container -->

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/switchery/switchery.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/es.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/switchery/switchery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('clearErrors', () => {
                $('.text-errors').text('');
            });

            window.livewire.on('refreshSection', () => {
                activeSelect2('#category_document', 'category_document');
            });

            window.livewire.on('refreshComponent', () => {
                $('[data-plugin="switchery"]').each(function (e) {
                    new Switchery($(this)[0], $(this).data())
                });

                activeSelect2('#category_statement', 'category_statement');
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

        function activeSelect2(sel, varModel) {
            $(sel).select2({
                theme: `material`,
                placeholder: "Seleccione...",
            });
            $(sel).on('change', function (e) {
            @this.set(varModel, e.target.value);
            });
        }
    </script>
@endpush
