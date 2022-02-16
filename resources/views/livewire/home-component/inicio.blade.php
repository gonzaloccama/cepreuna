<!-- Begin Banner Area -->
<div class="banner container" style="margin-top: -7.5em; position: relative; z-index: 1">
    <?php
    $banner = \App\Models\CycleAcademy::where('status', '1')->orderBy('created_at', 'desc')->first();
    ?>
    <div class="col-md-12">
        <div class="card shadow  rounded-0">
            <div class="card-body row g-lg-9">
                <div class="col-lg-12 col-md-12">
                    <div class="banner-item text-white"
                         style="background-image: url('{{ asset('assets/images/banner/inner-bg/1-1.png') }}'); background-size: cover;"
                        {{--                     data-bg-image="{{ asset('assets/images/banner/inner-bg/1-1.png') }}"--}}
                    >
                        <div class="banner-content text-center">
                            <div class="row">
                                <div class="col-md-12 pt-0">
                                    <h3 class="title mb-3">{{ $banner->cicle }}</h3>
                                </div>
                                <hr>

                                <div class="col-md-4">
                                    <div class="user-content">
                                        <h5 class="user-name text-primary mb-0">Inscripciones</h5>
                                        <span class="user-occupation">Inscripciones desde {{ $this->dateSpanish($banner->start_register) }}
                                        hasta {{ $this->dateSpanish($banner->finish_register) }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="user-content">
                                        <h5 class="user-name text-primary mb-0">Inicio del CEPREUNA</h5>
                                        <span
                                            class="user-occupation">Inicio de clases {{ $this->dateSpanish($banner->start_class) }}</span>
                                    </div>
                                </div>

                                @if(Carbon\Carbon::now() <= $banner->finish_register)
                                    <div class="col-md-4">
                                        <div class="user-content mt-3">
                                            <div class="button-wrap">
                                                <a class="btn btn-custom btn-primary btn-white-hover"
                                                   href="{{ $banner->go_link }}" target="_blank">Inscribirme</a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4">
                                        <div class="user-content">
                                            <h5 class="user-name text-primary mb-0">Culminación del CEPREUNA</h5>
                                            <span
                                                class="user-occupation">Finalización {{ $this->dateSpanish($banner->finish_class) }}</span>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Begin .... Area -->
<div class="project-area py-115" style="background-color: rgba(17,55,119,0.15); margin-top: 20px; margin-bottom: 20px">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <?php
                $new_banners = [
                    ['page' => 'estudiantes', 'title' => 'Estudiantes', 'image' => 'sd-1.jpg'],
                    ['page' => 'docentes', 'title' => 'Docentes', 'image' => 'sd-2.jpg'],
                    ['page' => 'padre-de-familia', 'title' => 'Padre de familia', 'image' => 'sd-3.jpg'],
                ];
                ?>
                @foreach($new_banners as $new_banner)
                    <div class="col-lg-4 col-sm-4 pb-6">
                        <div class="project-item shadow">
                            <a class="project-img" href=""
                               wire:click.prevent="updateMenu('{{ $new_banner['page'] }}', '{{ $new_banner['title'] }}')">
                                <img src="{{ asset('assets/images/banner/medium-size/').'/'.$new_banner['image'] }}"
                                     alt="{{ $new_banner['title'] }}" class="img-thumbnail rounded-0">
                            </a>
                            <div class="project-content with-boxshadow">
                                <span class="sub-title">Ver sección de:</span>
                                <h3 class="title mb-0">
                                    <a href=""
                                       wire:click.prevent="updateMenu('{{ $new_banner['page'] }}', '{{ $new_banner['title'] }}')">
                                        {{ $new_banner['title'] }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- .... Area End Here -->

<!-- Begin cycles Area -->
<div class="project-area py-115" style="background-image: linear-gradient(rgba(0,54,90,0.78), rgb(0,54,90,0.78))">
    <div class="container">
        <?php
        $cycles = \App\Models\CycleAcademy::orderBy('created_at', 'desc')->where('status', '1')->take(4)->get();
        ?>
        <div class="section-title-area pb-70">
            <div class="section-title pb-5 pb-lg-0">
                <h2 class="mb-0 font-size-50 text-white">Ciclos Recientes</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-arrow-holder position-relative">
                    <!-- Add Arrows -->
                    <div class="custom-button-wrap d-none d-md-flex">
                        <div class="custom-button-prev b-3">
                            <i class="ion-chevron-left"></i>
                        </div>
                        <div class="custom-button-next b-3">
                            <i class="ion-chevron-right"></i>
                        </div>
                    </div>
                    <div class="swiper-container project-slider-3">
                        <div class="swiper-wrapper">
                            @foreach($cycles as $cycle)
                                @php
                                    $pattern_url = '~[a-z]+://\S+~';
                                    $isUrl = '';
                                    if (preg_match_all($pattern_url, $cycle->image, $out)) {
                                        $isUrl = $out[0];
                                    }
                                @endphp
                                <div class="swiper-slide">
                                    <div class="project-item">
                                        <a class="project-img"
                                           href="{{ route('home').'/?page=ciclos&viewDetailID='.$cycle->id.'&details=detail-cycle' }}"
                                           wire:click.prevent="">
                                            @if($isUrl == '')
                                                <img
                                                    src="{{ asset('assets/images/project/medium-size/').'/'.$cycle->image }}"
                                                    alt="{{ $cycle->cicle }}">
                                            @else
                                                <img src="{{ $isUrl[0] }}" alt="{{ $cycle->cicle }}">
                                            @endif
                                        </a>
                                        <div class="project-content with-boxshadow style-2 p-3"
                                             style="background-color: white !important;">
                                            <a href="{{ route('home').'/?page=ciclos&viewDetailID='.$cycle->id.'&details=detail-cycle' }}">
                                                <h5 class="title mb-0 pt-3">{{ $cycle->cicle }}</h5>
                                            </a>
                                            <hr>
                                            <div class="" style="font-size: 14px;">
                                                <b class="sub-title"><u>INICIO DE INSCRIPCIONES</u>:
                                                    <br> {{ $this->dateSpanish($cycle->start_register) }}</b>
                                                <hr>
                                                <b class="sub-title"><u>FECHA FINAL DE INSCRIPCIONES</u>:
                                                    <br> {{ $this->dateSpanish($cycle->finish_register) }}</b>
                                                <hr>
                                                <b><u>INICIO DE CLASES</u>:
                                                    <br> {{ $this->dateSpanish($cycle->start_class) }}</b>
                                                <hr>
                                                @php
                                                    $status = Carbon\Carbon::now() <= $cycle->finish_register;
                                                    $status = (int)$cycle->status && $status;
                                                @endphp
                                                @if($status)
                                                    <div class="alert alert-success aler rounded-0 pb-3">
                                                        <b>HABILITADO</b>
                                                    </div>
                                                @else
                                                    <div class="alert alert-danger rounded-0 pb-3">
                                                        <b>CERRADO</b>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cycles Area ENd Here -->


<!-- Begin services Area -->
<div class="testimonial-area py-115">
    <div class="container">
        <?php
        $services = \App\Models\ManualsAndServices::orderBy('order')->get();
        ?>
        <div class="row">
            <div class="col-xl-4 col-lg-5 pb-6 pb-lg-0">
                <div class="section-title-wrap-2">
                    <div class="section-title border-0 pt-10">
                        <h2 class="mb-7">Manuales & Servicios</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="swiper-container testimonial-slider-1">
                    <div class="swiper-wrapper testimonial-flex-direction">
                        @foreach($services as $service)
                            <?php
                            $_services = str_word_count($service->text, 1, 'éÉíÍúÚóÓàáãçñÑ1234567890');
                            $iter = 0;
                            $text = '';
                            foreach ($_services as $item) {
                                if (++$iter == count($_services)) {
                                    $text .= '<br>' . $item;
                                } else {
                                    $text .= $item . ' ';
                                }
                            }
                            ?>
                            <div class="swiper-slide shadow">
                                <div class="testimonial-item">
                                    <div class="testimonial-content">

                                        <div class="service-img shadow">
                                            <a href="{{ $service->url }}" class="card card-img p-3 rounded-0"
                                               target="_blank">
                                                <img
                                                    src="{{ asset('assets/images/service/medium-size/').'/'.$service->image }}"
                                                    alt="{{ $service->text }}" class="img-fluid">
                                            </a>
                                            <div class="add-action text-center">
                                                <h6 class="text-white mb-0">
                                                    <a href="{{ $service->url }}">{!! $text !!}</a>
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="testimonial-pagination d-md-none"></div>

                    <!-- Add Arrows -->
                    <div class="testimonial-button-next"></div>
                    <div class="testimonial-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End Here -->

<!-- Begin Blog Area -->
<div class="blog-area py-115" style="background-image: linear-gradient(rgba(236,236,236,0.37), rgba(233,233,233,0.46))">
    <?php
    $posts = \App\Models\Post::orderBy('created_at', 'desc')->take(4)->get();
    ?>
    <div class="container">
        <div class="section-title-area pt-0 pb-70">
            <div class="section-title pb-5 pb-lg-0">
                <h2 class="mb-0 font-size-50">Ultimas noticias</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container blog-slider-1">
                    <div class="swiper-wrapper">
                        @foreach($posts as $post)
                            <div class="swiper-slide p-3 pb-5">
                                <div class="blog-item shadow shadow">
                                    <a class="blog-img"
                                       href="{{ route('home').'/?page=noticias&viewDetailID='.$post->id.'&details=detail-post' }}">
                                        <img class="img-full" src="{{ asset('assets/images/post/').'/'.$post->image }}"
                                             alt="{{ $post->title }}" style="height: 260px;">
                                    </a>
                                    <div class="blog-content">
                                        <span
                                            class="blog-meta text-uppercase">{{ $post->user->username }}  |  {{ $this->dateSpanish($post->created_at, 'without') }}</span>
                                        <h3 class="title mb-2">
                                            <a href="{{ route('home').'/?page=noticias&viewDetailID='.$post->id.'&details=detail-post' }}">
                                                {{ strlen($post->title) > 45?substr($post->title, 0, 45).'...':$post->title }}
                                            </a>
                                        </h3>
                                        <p class="mb-4 text-justify">
                                            {{ strlen($post->short_description) > 110?substr($post->short_description, 0, 110).'...':$post->short_description }}
                                        </p>
                                        <ul class="blog-button-wrap">
                                            <li>
                                                <a class="btn btn-link p-0"
                                                   href="{{ route('home').'/?page=noticias&viewDetailID='.$post->id.'&details=detail-post' }}">Leer
                                                    más</a>
                                            </li>
                                            <li>
                                                <a href="#"><span
                                                        class="blog-meta text-uppercase">{{ $post->category->category }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="blog-pagination d-md-none"></div>

                    <!-- Add Arrows -->
                    <div class="blog-button-next"></div>
                    <div class="blog-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End Here -->


