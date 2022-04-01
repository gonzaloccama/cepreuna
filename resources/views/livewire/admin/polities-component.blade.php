<div class="container-fluid">

    @include('livewire.widgets.breadcrumb')


    @include('livewire.admin.polities-component.'.$frame)


</div> <!-- container -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/switchery/switchery.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/switchery/switchery.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('refreshSection', () => {
                activeCkeditor('#privacy_policy', 'privacy_policy');
            });

            window.livewire.on('refreshComponent', () => {
                $('[data-plugin="switchery"]').each(function (e) {
                    new Switchery($(this)[0], $(this).data())
                });

                activeSelect2('#group', 'group');
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

        function activeSelect2(sel, varModel) {
            $(sel).select2({
                theme: `material`,
                placeholder: "Seleccione...",
            });
            $(sel).on('change', function (e) {
                @this.
                set(varModel, e.target.value);
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
