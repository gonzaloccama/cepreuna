<div style="min-height: 1000px;">
    <?php
    $img = auth()->user()->user_gender == 2 ? 'woman.png' : 'man.png';
    $profile = auth()->user()->user_cover ? auth()->user()->user_cover : $img;
    ?>

    @if(!$isProfile || $profile_id == auth()->user()->id)
        <div class="col-sm-12">
            <div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch shadow">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title" wire:ignore>
                        <h4 class="card-title font-rajdhani uppercase weight-500">Crear post

                            <a href="javascript:;" class="ml-3 text-danger font-16" data-toggle="tooltip"
                               data-html="true" data-placement="bottom" data-custom-class="tooltip-primary"
                               title="
                                   <b>Copiar la URL de un video YouTube</b><hr class='mt-1 mb-1 bg-light'>
                                   <img src=&quot;{{ asset('assets/images/service/help-youtube.png') }}&quot; class='img-fluid'>
                                   <hr class='mt-1 mb-1 bg-light'>Pegar la URL en Crear Post
                                ">
                                <i class="simple-icon-info text-youtube"></i>
                            </a>

                            <a href="javascript:;" class="text-danger font-16" data-toggle="tooltip"
                               data-html="true" data-placement="bottom" data-custom-class="tooltip-primary"
                               title="
                                   <b>Copiar la URL de un Documento PDF Google Drive</b><hr class='mt-1 mb-1 bg-light'>
                                   <img src=&quot;{{ asset('assets/images/service/help-1-gdrive.png') }}&quot; class='img-fluid'>
                                   <hr class='mt-1 mb-1 bg-light'>
                                   <img src=&quot;{{ asset('assets/images/service/help-2-gdrive.png') }}&quot; class='img-fluid'>
                                   <hr class='mt-1 mb-1 bg-light'>Pegar la URL en Crear Post
                                ">
                                <i class="simple-icon-info text-gdrive"></i>
                            </a>

                            <a href="javascript:;" class="text-danger font-16" data-toggle="tooltip"
                               data-html="true" data-placement="bottom" data-custom-class="tooltip-primary"
                               title="
                                   <b>Para utilizar los emojis</b><hr class='mt-1 mb-1 bg-light'>
                                   <img src=&quot;{{ asset('assets/images/service/help-1-emoji.png') }}&quot; class='img-fluid'>
                                   <hr class='mt-1 mb-1 bg-light'> Clic en el emoji deseado <br>
                                   No borrar el c??digo generado del area de texto
                                   <hr class='mt-1 mb-1 bg-light'>
                                   <img src=&quot;{{ asset('assets/images/service/help-2-emoji.png') }}&quot; class='img-fluid'>
                                   <hr class='mt-1 mb-1 bg-light'>
                                ">
                                <i class="simple-icon-info text-warning"></i>
                            </a>

                        </h4>


                    </div>
                </div>
                <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                    <div class="d-flex align-items-center">
                        <div class="user-img">
                            <img src="{{ asset('assets/images/users/').'/'.$profile }}" alt="userimg"
                                 class="avatar-60 rounded-circle">
                        </div>
                        <form class="post-text ml-3 w-100" action="javascript:;">
                            <input type="text" class="form-control border-0"
                                   placeholder="Escribe algo aqu??..." style="border:none;">
                        </form>
                    </div>
                    <hr>
                </div>
                @include('livewire.social.media-home-component.posts-modal')
            </div>
        </div>
    @endif



    @foreach($posts as $post)
        <?php
        $img = $post->user->user_gender == 2 ? 'woman.png' : 'man.png';
        $profile = $post->user->user_cover ? $post->user->user_cover : $img;
        ?>
        <div class="col-sm-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow">
                <div class="iq-card-body">
                    <div class="user-post-data">
                        <div class="d-flex flex-wrap">
                            <div class="media-support-user-img mr-3">
                                <img class="rounded-circle img-fluid"
                                     src="{{ asset('assets/images/users/').'/'.$profile }}" alt="">
                            </div>
                            <div class="media-support-info mt-2">
                                <h5 class="mb-0 d-inline-block">
                                    <a href="{{ route('social.profile', ['id' => base64_encode($post->user->id)]) }}"
                                       class="font-weight-medium roboto weight-300">{{ $post->user->fullname }}</a>
                                </h5>
                                @if($post->origin_id)
                                    <p class="mb-0 d-inline-block text-info font-rajdhani-13 weight-600"> &#x25cf <u>Compartido</u>
                                    </p>
                                @endif
                                @if($post->post_type == 'profile_picture')
                                    <p class="mb-0 d-inline-block text-info font-rajdhani-13 weight-600"> &#x25cf <u>Fondo
                                            de perfil</u></p>
                                @endif
                                @if($post->post_type == 'profile_cover')
                                    <p class="mb-0 d-inline-block text-info font-rajdhani-13 weight-600"> &#x25cf <u>Foto
                                            de perfil</u></p>
                                @endif
                                @if($saved)
                                    <p class="mb-0 d-inline-block text-info font-rajdhani-13 weight-600"> &#x25cf <u>Guardado</u>
                                    </p>
                                @endif
                                <p class="mb-0 text-primary">{{ $this->timeElapsedString($post->created_at) }}</p>
                            </div>

                            <div class="iq-card-post-toolbar">
                                <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" role="button">
                                            <i class="ri-more-fill"></i>
                                          </span>
                                    @include('livewire.social.media-home-component.posts-actions')
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('livewire.social.media-home-component.posts')

                    <div class="comment-area mt-3">

                        <?php
                        $comments = \App\Models\MediaPostsComment::where('node_id', $post->id)
                            ->latest();
                        if ($all_comment == $post->id) {
                            $comments = $comments->get();
                        } else {
                            $comments = $comments->paginate($less_comment);
                        }

                        $comments_count = \App\Models\MediaPostsComment::where('node_id', $post->id)->count();

                        $likes = \App\Models\MediaPostsReaction::where('post_id', $post->id)->get();
                        $likes_count = \App\Models\MediaPostsReaction::where('post_id', $post->id)->count();
                        ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="like-block position-relative d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <?php
                                    $pass = [
                                        'user' => auth()->user()->id,
                                        'post' => $post->id,
                                        'post_type' => $post->post_type != '' ? $post->post_type : 'post',
                                    ];
                                    ?>

                                    @include('livewire.social.media-home-component.posts-reactions')

                                    <div class="total-like-block ml-2 mr-3">
                                        <div class="dropdown">
                                                    <span class="dropdown-toggle" data-toggle="dropdown"
                                                          aria-haspopup="true" aria-expanded="false" role="button">
                                                    {{ $likes_count==1?$likes_count.' like':$likes_count.' likes' }}
                                                    </span>
                                            @if($likes_count)
                                                <div class="dropdown-menu">
                                                    @foreach($likes as $like)
                                                        <a class="dropdown-item"
                                                           href="#">{{ $like->user->fullname }}</a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="total-comment-block">
                                    <div class="dropdown">
                                                 <span class="dropdown-toggle" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false" role="button">
                                                 {{ $comments_count }} Comentarios
                                                 </span>
                                        @if($comments_count)
                                            @php
                                                $userComment = [];
                                            @endphp
                                            <div class="dropdown-menu">
                                                @foreach($comments as $comment)
                                                    @if(!in_array($comment->user_id, $userComment))
                                                        @php
                                                            array_push($userComment, $comment->user_id);
                                                        @endphp
                                                        <a class="dropdown-item"
                                                           href="#">{{ $comment->user->fullname }}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @include('livewire.social.media-home-component.posts-shared')
                        </div>

                        <hr class="mb-1">

                        @if(0)
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="like-block position-relative d-flex align-items-center">
                                    <div class="reaction-group mb-0 pb-0">
                                        <?php
                                        $_reactions = [
                                            (object)['title' => 'Me gusta', 'img' => 'like-1.png'],
                                            (object)['title' => 'Me encanta', 'img' => 'heart.png'],
                                            (object)['title' => 'Estoy feliz', 'img' => 'happy.png'],
                                        ];
                                        ?>
                                        @foreach($_reactions as $item)
                                            <a href="javascript:;" class="reaction reaction-sm" data-toggle="tooltip"
                                               data-original-title="{{ $item->title }}">
                                                <img alt="{{ $item->title }}" class="rounded-circle"
                                                     src="{{ asset('assets/images/icon/').'/'.$item->img }}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1 mt-0">
                        @endif

                        @if($comments_count > $less_comment && !$all_comment && $all_comment != $post->id)
                            <a href="" class="roboto weight-400 ml-3"
                               wire:click.prevent="viewCommentAll({{ $post->id }})">Ver todo</a>
                        @elseif($comments_count > $less_comment && $all_comment != $post->id)
                            <a href="" class="roboto weight-400 ml-3"
                               wire:click.prevent="viewCommentAll({{ $post->id }})">Ver todo</a>
                        @elseif($comments_count > $less_comment && $all_comment)
                            <a href="" class="roboto weight-400 ml-3"
                               wire:click.prevent="viewCommentAll(null)">Ver menos</a>
                        @else
                            {{ __('') }}
                        @endif

                        <ul class="post-comments p-0 m-0 {{ $comments_count > $less_comment ? 'mt-2': '' }}">
                            @foreach($comments->reverse() as $comment)
                                @php
                                    $img = $comment->user->user_gender == 2 ? 'woman.png':'man.png';
                                    $profile = $comment->user->user_cover?$comment->user->user_cover:$img;
                                @endphp
                                <li class="mb-2">
                                    <div class="d-flex flex-wrap row ml-2">
                                        <div class="user-img col-md-1 col-2 text-right">
                                            <img src="{{ asset('assets/images/users/').'/'.$profile }}"
                                                 alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                        </div>

                                        <div class="comment-data-block ml-2 col-md-10 col-9">
                                            <div class="p-2" style="background-color: rgba(91,91,91,0.07)">
                                                <h6>
                                                    <a href="{{ route('social.profile', ['id' => base64_encode($comment->user->id)]) }}"
                                                       class="roboto weight-300">
                                                        {{ $comment->user->fullname }}
                                                    </a>
                                                </h6>
                                                <p class="mb-0" ondragstart="return false" onselectstart="return false"
                                                   oncontextmenu="return false">
                                                    @include('livewire.widgets.icon-regex.pattern-comment-emojis', ['content' => $comment->text, 'w' => 30])
                                                </p>
                                                {{--                                                <p class="mb-0">{{ $comment->text }}</p>--}}
                                            </div>
                                            <div style="font-size: 12px; font-weight: 600;"
                                                 class="d-flex flex-wrap align-items-center comment-activity ml-2 pt-1 pb-1">
                                                @include('livewire.social.media-home-component.posts-comments-reactions')
                                                {{--                                                <a href="javascript:;">respuesta</a>--}}
                                                @if($comment->user_id == auth()->user()->id)
                                                    <a href="#"
                                                       wire:click.prevent="deletePostsComment({{ $comment->id }})">
                                                        eliminar
                                                    </a>
                                                @endif
                                                {{--                                                            <a href="javascript:;">translate</a>--}}
                                                <span>{{ $this->timeElapsedString($comment->created_at) }}</span>
                                            </div>
                                            {{--
                                                                                        <ul class="post-comments border mt-2 mb-2 p-2 w-100">
                                                                                            <li class="mb-2">
                                                                                                <div class="d-flex flex-wrap row">
                                                                                                    <div class="user-img col-2 text-right">
                                                                                                        <img src="{{ asset('assets/images/users/').'/'.$profile }}"
                                                                                                             alt="userimg"
                                                                                                             class="avatar-35 rounded-circle img-fluid">
                                                                                                    </div>

                                                                                                    <div class="comment-data-block ml-3 col-9">
                                                                                                        <h6>
                                                                                                            <a href=""
                                                                                                               class="roboto weight-300">
                                                                                                                Julio Quispe
                                                                                                            </a>
                                                                                                        </h6>
                                                                                                        <p class="mb-0">que fue como vas en esto.</p>
                                                                                                        <div
                                                                                                            class="d-flex flex-wrap align-items-center comment-activity">

                                                                                                            @if($comment->user_id == auth()->user()->id)
                                                                                                                <a href="#"
                                                                                                                   wire:click.prevent="deletePostsComment({{ $comment->id }})"
                                                                                                                >
                                                                                                                    eliminar
                                                                                                                </a>
                                                                                                            @endif
                                                                                                            <a href="javascript:;">translate</a>
                                                                                                            <span>2021-12-12</span>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <form class="comment-text d-flex align-items-center mt-2">

                                                                                                    <input class="form-control media-comment" rows="1"
                                                                                                           wire:model="text">

                                                                                                    <div class="comment-attagement d-flex p-1">
                                                                                                        <button type="submit" class="btn btn-primary"
                                                                                                                wire:click.prevent="storePostsComment">
                                                                                                            <i class="ri-send-plane-2-fill"></i>
                                                                                                        </button>
                                                                                                    </div>

                                                                                                </form>
                                                                                            </li>
                                                                                        </ul>
                                                                                        --}}
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @livewire('social.media-posts-comment-component', $pass, key($post->id))

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if(filled($posts))
        @if($load <= $posts->count())
            <div class="col-sm-12 text-center">

                <button class="btn btn-link roboto-link weight-500 font-size-16" wire:click.prevent="loadMore">
                    {{--            <img src="{{ asset('assets/social/images/page-img/page-load-loader.gif') }}"--}}
                    {{--                 alt="loader" style="height: 100px;">--}}
                    Cargar m??s
                </button>

            </div>
        @endif
    @endif
</div>


