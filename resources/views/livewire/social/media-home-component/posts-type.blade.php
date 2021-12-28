@php
    $pattern_url = '~[a-z]+://\S+~';

    $pattern_id = '#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#';
    $idUrl = '';

    $file_pattern_id = '/(file\/d\/)(.*)(\/)/';
    $idFileUrl = '';
    $text = $data->text;

    if ($data->text) {
        if (preg_match_all($pattern_url, $data->text, $out)) {
            $findUrl = $out[0];
        }
        if ($findUrl) {
            if (preg_match_all($pattern_id, $findUrl[0], $matches)) {
                $idUrl = $matches[0];
            }
            if (preg_match_all($file_pattern_id, $findUrl[0], $matches)) {
                $idFileUrl = $matches[0];
            }
            foreach ($findUrl as $item){
                $new_url = '<a href="' . $item . '" target="_blank">' . $item . '</a>';
                $text = str_replace($item, $new_url, $text);
            }
        }
    }
@endphp
<div class="container mt-2">
    <p class="text-justify">{!! $text!=''?$text:$data->text !!}</p>
</div>
@if($data->post_type != '')
    @if($data->post_type == 'photo')
        @php
            $post_photo = \App\Models\MediaPostsPhoto::where('post_id', $data->id)->first();
        @endphp
        <div class="col-md-12 mb-3">
            <div class="baguetteBoxThree gallery">
                <a href="{{ asset('assets/uploads/users/posts-photos/').'/'.$post_photo->source }}">
                    <img src="{{ asset('assets/uploads/users/posts-photos/').'/'.$post_photo->source }}" alt=""
                         class="img-fluid w-100 shadow-sm">
                </a>
            </div>
        </div>
    @elseif($data->post_type == 'profile_picture')
        @php
            $post_photo = \App\Models\MediaPostsPhoto::where('post_id', $data->id)->first();
        @endphp
        <div class="col-md-12 mb-3">
            <div class="baguetteBoxThree gallery">
                <a href="{{ asset('assets/images/users/').'/'.$post_photo->source }}">
                    <img src="{{ asset('assets/images/users/').'/'.$post_photo->source }}" alt=""
                         class="img-fluid w-100 shadow-sm">
                </a>
            </div>
        </div>
    @elseif($data->post_type == 'profile_cover')
        @php
            $post_photo = \App\Models\MediaPostsPhoto::where('post_id', $data->id)->first();
        @endphp

        <div class="profile-header">
            <div class="cover-container"
                 style="background-image:linear-gradient(
                     rgba(0,15,57,0.45), rgba(0,15,57,0.45)),
                     url('{{ asset('assets/images/users/').'/'.auth()->user()->user_picture }}');
                     background-size: cover;height: 200px ">
            </div>
            <div class="user-detail text-center mb-3">
                <div class="profile-img cover-container">
                    <div class="baguetteBoxThree gallery">
                        <a href="{{ asset('assets/images/users/').'/'.$post_photo->source }}">
                            <img src="{{ asset('assets/images/users/').'/'.$post_photo->source }}" alt=""
                                 class="avatar-130 img-fluid">
                        </a>
                    </div>
                </div>

            </div>
        </div>

    @elseif($data->post_type == 'video')
        @php
            $post_video = \App\Models\MediaPostsVideo::where('post_id', $data->id)->first();
        @endphp
        <div class="col-md-12 mb-3 text-center">
            <video class="video-container img-fluid w-100 shadow-sm" controls>
                <source src="{{ asset('assets/uploads/users/posts-videos/').'/'.$post_video->source }}"
                        type="video/mp4">
                Your browser does not support HTML video.
            </video>
        </div>

    @elseif($data->post_type == 'file')
        @php
            $post_file = \App\Models\MediaPostsFile::where('post_id', $data->id)->first();
        @endphp
        <div class="col-md-12 text-center mb-3">
            <a href="{{ asset('assets/uploads/users/posts-files/').'/'.$post_file->source }}"
               target="_blank" class="font-italic">
                <img src="{{ asset('assets/images/icon/pdf-page.png') }}"
                     class="img-fluid shadow-sm" alt="" width="60"><br>{{ $post_file->source }}
            </a>
        </div>
    @endif
@elseif($idUrl != '' && $findUrl)
    <div class="col-md-12 mb-3 text-center" wire:ignore.self>
        <div class="video-container img-fluid shadow-sm">
            <iframe src="https://www.youtube.com/embed/{{ $idUrl[0] }}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen class="w-100 h-100"></iframe>
        </div>
    </div>
    @php $findUrl=[] @endphp
@elseif($idFileUrl != '' && $findUrl)
    <div class="col-md-12 mb-3 text-center">
        <iframe src="https://drive.google.com/{{ $idFileUrl[0] }}preview?usp=sharing&embedded=true"
                style="width:100%; height:200px;" frameborder="0"></iframe>
    </div>
    @php $findUrl=[] @endphp
@endif
