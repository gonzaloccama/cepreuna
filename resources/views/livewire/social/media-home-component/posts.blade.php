@if($post->post_type == 'shared')

    <div class="container mt-2">
        <p class="text-justify">{!! $post->text !!}</p>
    </div>

    <div class="border mt-3 pl-2 pr-2">
        <?php
        $post_shared = \App\Models\MediaPost::where('id', $post->origin_id)->first();
        ?>
        @if($post_shared)
            <?php
            $img = $post_shared->user->user_gender == 2 ? 'woman.png' : 'man.png';
            $_profile = $post_shared->user->user_cover ? $post_shared->user->user_cover : $img;
            ?>
            <div class="user-post-data pt-3 p-2 text-left">
                <div class="d-flex flex-wrap">
                    <div class="media-support-user-img mr-3">
                        <img class="rounded-circle img-fluid"
                             src="{{ asset('assets/images/users/').'/'.$_profile }}" alt="">
                    </div>
                    <div class="media-support-info mt-2">
                        <h5 class="mb-0 d-inline-block">
                            <a href="{{ route('social.profile', ['id' => base64_encode($post_shared->user_id)]) }}"
                               class="font-weight-medium roboto weight-300">{{ $post_shared->user->fullname }}</a>
                        </h5>
                        <p class="mb-0 text-primary">{{ $this->timeElapsedString($post_shared->created_at) }}</p>
                    </div>
                </div>
            </div>
            @include('livewire.social.media-home-component.posts-type', ['data' => $post_shared])
        @else
            <div class="pt-3 pb-1 pl-2 pr-2 col-md-12">
                <div class="alert alert-danger rounded-0" role="alert">
                    <div class="iq-alert-text pl-3 weight-500">
                        <i class="simple-icon-trash mt-1"></i> ¡Publicación eliminada!
                    </div>
                </div>
            </div>
        @endif
    </div>

@else
    @include('livewire.social.media-home-component.posts-type', ['data' => $post])
@endif

