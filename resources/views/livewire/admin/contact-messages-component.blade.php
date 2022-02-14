<div class="container-fluid">
    @include('livewire.widgets.breadcrumb')
    @include('livewire.admin.contact-messages-component.'.$frame)
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
            window.livewire.on('clearErrors', () => {
                $('.text-errors').text('');
            });

            window.livewire.on('refreshSection', () => {
                activeSelect2('#category_document', 'category_document');
                activeCkeditor('#description', 'description');
            });

            window.livewire.on('refreshComponent', () => {
                $('[data-plugin="switchery"]').each(function (e) {
                    new Switchery($(this)[0], $(this).data())
                });

                activeSelect2('#category_post', 'category_post');
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

