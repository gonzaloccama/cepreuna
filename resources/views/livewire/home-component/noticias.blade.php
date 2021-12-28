<!-- Begin Blog Area -->
<div class="blog-area py-115">
    @php
        $posts = \App\Models\Post::orderBy('created_at', 'desc')->paginate($postLoadMore);
    @endphp
    <div class="container">
        <div class="row">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 pt-6">
                        <div class="blog-item">
                            <div class="inner-item">
                                <a class="blog-img text-center" href=""
                                   wire:click.prevent="details({{ $post->id }},'post')">
                                    <div class="" style="background-image: linear-gradient(#00365A, #00365A);">
                                        <img class="img-full" src="{{ asset('assets/images/post/').'/'.$post->image }}"
                                             alt="{{ $post->title }}" style="height: 260px;">
                                    </div>
                                </a>
                                <div class="blog-content">
                                <span
                                    class="blog-meta text-uppercase">{{ $post->user->username }}  |  {{ $this->dateSpanish($post->created_at, 'without') }}</span>
                                    <h3 class="title mb-3">
                                        <a href="" wire:click.prevent="details({{ $post->id }},'post')">
                                            {{ strlen($post->title) > 45?substr($post->title, 0, 45).'...':$post->title }}
                                        </a>
                                    </h3>
                                    <p class="mb-4 text-justify">
                                        {{ strlen($post->short_description) > 110?substr($post->short_description, 0, 110).'...':$post->short_description }}
                                    </p>
                                    <ul class="blog-button-wrap">
                                        <li>
                                            <a class="btn btn-link p-0" href=""
                                               wire:click.prevent="details({{ $post->id }},'post')">Leer</a>
                                        </li>
                                        <li>
                                            <a href="#"> {{ $post->category->category }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="user-info align-items-center">
                    <div class="user-content">
                        <a href="javascript:;" class="text-center">
                            <h5 class="text-primary font-size-25 mb-0"
                                style="font-weight: 500">{{ __('¡No hay noticias publicadas!') }}</h5>
                            <div class="user-occupation">{{ __('Las noticias se publicaran aqui...') }}</div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Blog Area End Here -->
