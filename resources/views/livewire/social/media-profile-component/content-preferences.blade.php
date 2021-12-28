{{--<div class="iq-card">--}}
{{--    <div class="iq-card-body">--}}
{{--        <a href="#"><span--}}
{{--                class="badge badge-pill badge-primary font-weight-normal ml-auto mr-1"><i--}}
{{--                    class="ri-star-line"></i></span> 27 Items for yoou</a>--}}
{{--    </div>--}}
{{--</div>--}}

{{--
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">Eventos</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <p class="m-0"><a href="javacsript:;"> Crear </a></p>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="row">

            <div class="col-sm-12">
                <div class="event-post position-relative">
                    <a href="javascript:;"><img
                            src="{{ asset('assets/social/images/ages/page-img/07.jpg') }}"
                            alt="gallary-image" class="img-fluid rounded"></a>
                    <div class="job-icon-position">
                        <div
                            class="job-icon bg-primary p-2 d-inline-block rounded-circle">
                            <i class="ri-briefcase-line"></i></div>
                    </div>
                    <div class="iq-card-body text-center p-2">
                        <h5>Started New Job at Apple</h5>
                        <p>January 24, 2019</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
--}}

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title font-rajdhani uppercase weight-500">Fotos</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
{{--            <p class="m-0"><a href="javacsript:;">Añadir foto </a></p>--}}
        </div>
    </div>
    <div class="iq-card-body">
        <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
            <?php
            $photos = \App\Models\MediaPostsPhoto::orderBy('created_at', 'desc')
                ->where('media_posts.user_id', $user->id)
                ->join('media_posts', 'media_posts_photos.post_id', '=', "media_posts.id")
                ->select('media_posts_photos.*')
                ->selectRaw('media_posts.user_id')
                ->selectRaw('media_posts.post_type')
                ->take(9)->get();
            ?>
            @foreach($photos as $photo)
                <?php
                    $path_photo = 'assets/uploads/users/posts-photos/';
                    if (in_array($photo->post_type, ['profile_picture', 'profile_cover'])){
                        $path_photo = 'assets/images/users/';
                    }
                ?>
                <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                    <div class="baguetteBoxPhotos gallery">
                        <a href="{{ asset($path_photo).'/'.$photo->source }}">
                            <div
                                style="background-image: url('{{ asset($path_photo).'/'.$photo->source }}'); background-size: cover; height: 50px"
                                class="img-fluid rounded-0 w-100" alt="Responsive image"></div>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

