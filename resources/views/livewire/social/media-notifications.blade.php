<li class="nav-item" wire:ignore.self>
    <a href="#" class="search-toggle text-white iq-waves-effect menu-social-color" wire:poll="mountData">
        <i class="ri-notification-3-fill"></i>
        @if(filled($notifications))
            <span class="bg-white dots"></span>
            <span class="icon-button__badge">{{ $notifications->count() }}</span>
        @endif
    </a>
    <div class="iq-sub-dropdown">
        <div class="iq-card shadow-none m-0">
            <div class="iq-card-body p-0 ">
                <div class="bg-primary p-3">
                    <h5 class="mb-0 text-white font-rajdhani font-size-16 weight-500">Notificciones
                        @if(filled($notifications))
                            <small class="badge badge-pill badge-light float-right pt-1">
                                {{ $notifications->count() }}
                            </small>
                        @endif
                    </h5>
                </div>
                @foreach($notifications as $notification)
                    <?php
                    $n_img = $notification->from_usr->user_gender == 2 ? 'woman.png' : 'man.png';
                    $n_profile = $notification->from_usr->user_cover ? $notification->from_usr->user_cover : $n_img;

                    $not_read = \App\Models\MediaMessage::where('from_user', $notification->from_usr->id)
                            ->where('to_user', auth()->user()->id)
                            ->where('is_read', 0)
                            ->latest()->first() ?? null;
                    ?>
                    <a href="{{ route('social.chat') }}" class="iq-sub-card">
                        <div class="media align-items-center">
                            <div class="">
                                <img class="avatar-40 rounded"
                                     src="{{  asset('assets/images/users/') . '/' . $n_profile }}" alt="">
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0 roboto">{{ $notification->from_usr->fullname }}</h6>
                                @if(filled($not_read))
                                    <small class="float-right font-size-12 text-primary roboto">

                                        {{ $not_read->created_at->diffForHumans() }}

                                    </small>
                                    <p class="mb-0 text-muted font-rajdhani-13">
                                        <?php
                                        $last_mssg = strlen($not_read->message) > 20 ?
                                            Str::limit($not_read->message, $limit = 20, $end = '...') :
                                            $not_read->message
                                        ?>
                                        {{ $last_mssg }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</li>
