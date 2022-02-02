@push('title') {{ $_title }} @endpush
<?php
$img = auth()->user()->user_gender == 2 ? 'woman.png' : 'man.png';
$profile = auth()->user()->user_cover ? auth()->user()->user_cover : $img;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-0 p-0">
            @livewire('social.media-posts-component', ['is_profile' => false])
        </div>

        @include('livewire.social.media-home-component.home-activities')

    </div>
</div>


@push('styles')

    <style>

        .upload label {
            cursor: pointer;
        }

        .video-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .video-container::after {
            padding-top: 56.25%;
            display: block;
            content: '';
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

@push('scripts')


    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('closeModalPost', () => {
                $('#post-modal').modal('hide');
            });

            window.livewire.on('closeModalPostShared', () => {
                $('#post-modal-shared').modal('hide');
                notificationSwal('¡Compartido extisomente!', 'rgba(47,122,67,0.89)');
            });

            window.livewire.on('refreshContent', () => {
                lightbox('.baguetteBoxThree');
            });
            lightbox('.baguetteBoxThree');
        });

        $(document).ready(function () {
            window.livewire.on('deleteAlert', () => {
                deleteSwal()
            });

            window.livewire.on('alertSaved', () => {
                notificationSwal('¡Publicación Guadada extisomente!', 'rgba(47,122,67,0.89)');
            });
        });
    </script>
@endpush


