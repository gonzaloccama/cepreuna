<div class="right-sidebar-mini right-sidebar">
    <?php
    $users = \App\Models\User::orderBy('created_at', 'desc')->paginate(10);
    ?>
    <div class="right-sidebar-panel p-0">
        <div class="iq-card shadow-none">
            <div class="iq-card-body p-0">
                <div class="media-height p-3">
                    @foreach($users as $user)
                        <?php
                        $img = $user->user_gender == 2 ? 'woman.png' : 'man.png';
                        $profile = $user->user_cover ? $user->user_cover : $img;
                        ?>
                        <div class="media align-items-center mb-4">
                            <div class="iq-profile-avatar status-online">
                                <img class="rounded-circle avatar-50"
                                     src="{{ asset('assets/images/users/').'/'.$profile }}" alt="">
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0">
                                    <a href="{{ route('social.profile', ['id' => base64_encode($user->id)]) }}"
                                       class="roboto weight-400">{{ $user->fullname }}</a>
                                </h6>
                                <p class="mb-0 ">{{ $user->user_role->role }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="right-sidebar-toggle bg-primary mt-3">
                    <i class="ri-arrow-left-line side-left-icon"></i>
                    <i class="ri-arrow-right-line side-right-icon"><span
                            class="ml-3 d-inline-block">Close Menu</span></i>
                </div>
            </div>
        </div>
    </div>
</div>
