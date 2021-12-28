<!-- Begin Blog Detail Area -->
<div class="blog-detail-area py-140">
    @php
        $result = \App\Models\Post::find($viewDetailID);
    @endphp
    <div class="container col-md-8  card rounded-0 shadow">
        <div class="row">
            <div class="col-md-12 m-auto row pt-5 pb-3">
                <div class="text-left col-md-6">
                    <h5 class="text-uppercase">{{$result->title}}</h5>
                </div>
                <div class="text-right col-md-6">
                    <button class="btn  rounded-0 btn-primary-hover" type="button" wire:click.prevent="cleanDetails">
                        <i class="iconsminds-to-left"></i> Regresar
                    </button>
                </div>
            </div>
            <div class="col-lg-12 p-9 m-auto">
                <div class="single-item">
                    <div class="single-img">
                        <img class="img-full" src="{{ asset('assets/images/post/').'/'.$result->image }}"
                             alt="{{ $result->title }}">
                    </div>
                    <div class="single-content pt-7 pb-8">
                        <span class="blog-meta d-block pb-1 text-uppercase">
                            {{ $result->user->username }}  |  {{ $this->dateSpanish($result->created_at) }}  |  {{ $result->category->category }}
                        </span>
                        <h2 class="title font-size-60 mb-4">{{ $result->title }}</h2>

                        <p class="short-desc mb-5 text-justify">{!! $result->description !!}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Detail Area End Here -->

