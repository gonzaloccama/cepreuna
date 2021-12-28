<!-- Begin Slider Area -->
<div class="slider-area">
    <!-- Main Slider -->
    <div class="swiper-container main-slider-1 swiper-arrow with-bg_white">
        <?php
        $sliders = \App\Models\systemSlider::where('status', '1')->orderBy('order')->get();
        ?>
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
                <?php
                $_slider = str_word_count($slider->title, 1, 'éÉíÍúÚóÓàáãçñÑ1234567890');
                $title = '';
                for ($i = 0; $i < count($_slider); $i++) {
                    if ($i == 0) {
                        $title .= $_slider[$i] . ' ';
                    } elseif ($i == 1) {
                        $title .= $_slider[$i] . ' <br>';
                    } elseif ($i == count($_slider) - 1) {
                        $title .= '<span class="t-white">'  .$_slider[$i]. '</span>';
                    } else {
                        $title .= $_slider[$i] . ' ';
                    }
                }
                ?>
                <div class="swiper-slide animation-style-01">
                    <div class="slide-inner bg-height"
                         style="background-image:linear-gradient(rgba(0,15,57,0.45), rgba(0,15,57,0.45)), url('{{ asset('assets/images/slider/').'/'.$slider->image }}'); background-size: cover; ">
                        <div class="container">
                            <div class="slide-content">
                                <h2 class="title mb-3 text-white">{!! $title !!}</h2>
                                <p class="short-desc-2 font-size-20 mb-7 text-white">{{ $slider->text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="swiper-slide animation-style-01">
                    <div class="slide-inner bg-height"
                         style="background-image:linear-gradient(rgba(1,5,21,0.57), rgba(1,5,21,0.57)), url('{{ asset('assets/images/slider/bg/1-1.jpg') }}'); background-size: cover; ">
                        <div class="container">
                            <div class="slide-content">
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination with-bg d-md-none"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<!-- Slider Area End Here -->
