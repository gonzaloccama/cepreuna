<div class="">
    @if($page == 'inicio')
        @include('livewire.home-component.sliders')
    @else
        @include('livewire.home-component.breadcrumb')
    @endif

    @if(!$details)
        @include('livewire.home-component.'.$page)
    @else
        @include('livewire.home-component.details-page.'.$details)
    @endif

{{--        <a class="trigger_popup_fricc">Click here to show the popup</a>--}}

{{--        <div class="hover_bkgr_fricc">--}}
{{--            <span class="helper"></span>--}}
{{--            <div>--}}
{{--                <div class="popupCloseButton">&times;</div>--}}
{{--                <p>Add any HTML content<br />inside the popup box!</p>--}}
{{--            </div>--}}
{{--        </div>--}}

</div>

@push('styles')

@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            window.livewire.on('refreshContent', () => {
                slide_3();
                slide_4();
                main_slider();
                team_1();
                blog_1();
            });

            window.livewire.on('loadingPage', () => {
                load_page()
            })

            slide_3();
            slide_4();
            main_slider();
            team_1();
            load_page();
            blog_1();

            $(".trigger_popup_fricc").click(function(){
                $('.hover_bkgr_fricc').show();
            });
            $('.hover_bkgr_fricc').click(function(){
                $('.hover_bkgr_fricc').hide();
            });
            $('.popupCloseButton').click(function(){
                $('.hover_bkgr_fricc').hide();
            });

        });

        $(document).scroll(function () {
            if ($('#sticky').hasClass('sticky')) {
                $('#logo-image').css('height', '60');
            } else {
                $('#logo-image').css('height', '75');
            }
        })

        function main_slider() {
            /* ---Main Slider--- */
            if ($('.main-slider-1').elExists()) {
                var swiper = new Swiper('.main-slider-1', {
                    loop: true,
                    slidesPerView: 1,
                    speed: 750,
                    autoplay: {
                        disableOnInteraction: false,
                        delay: 7000
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        type: 'bullets'
                    },
                });
            }
        }

        function slide_3() {
            /* ---Project Slider--- */
            if ($('.project-slider-3').elExists()) {
                var mySwiper = new Swiper('.project-slider-3', {
                    loop: true,
                    spaceBetween: 10,
                    slidesPerView: 3,
                    effect: "slide",
                    navigation: {
                        nextEl: '.custom-button-next.b-3',
                        prevEl: '.custom-button-prev.b-3',
                    },
                    pagination: {
                        el: '.project-pagination',
                        clickable: true,
                        type: 'custom'
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 1
                        },
                        992: {
                            slidesPerView: 2
                        },
                        1200: {
                            slidesPerView: 3
                        }
                    }
                });
            }
        }

        function slide_4() {
            /* ---Testimonial Slider--- */
            if ($('.testimonial-slider-1').elExists()) {
                var mySwiper = new Swiper('.testimonial-slider-1', {
                    loop: false,
                    spaceBetween: 40,
                    effect: "slide",
                    navigation: {
                        nextEl: '.testimonial-button-next',
                        prevEl: '.testimonial-button-prev',
                    },
                    pagination: {
                        el: '.testimonial-pagination',
                        clickable: true,
                        type: 'custom'
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                        },
                        420: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 3,
                        }
                    }
                });
            }
        }

        function team_1() {
            /* ---Team Member Slider--- */
            if ($('.team-member-slider-1').elExists()) {
                var mySwiper = new Swiper('.team-member-slider-1', {
                    loop: true,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    effect: "slide",
                    navigation: {
                        nextEl: '.team-button-next',
                        prevEl: '.team-button-prev',
                    },
                    pagination: {
                        el: '.team-pagination',
                        clickable: true,
                        type: 'custom'
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                        },
                        480: {
                            slidesPerView: 2
                        },
                        768: {
                            slidesPerView: 2
                        },
                        1200: {
                            slidesPerView: 4
                        }
                    }
                });
            }
        }

        function blog_1() {
            /* ---Blog Slider--- */
            if ($('.blog-slider-1').elExists()) {
                var mySwiper = new Swiper('.blog-slider-1', {
                    loop: true,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    effect: "slide",
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        type: 'bullets'
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2
                        },
                        1200: {
                            slidesPerView: 3
                        }
                    }
                });
            }
        }

        function load_page() {

            if ($("#progress").length === 0) {
                // inject the bar..
                $(".main-header").append($("<div><b class='top-progress'></b><i class='top-i'></i></div>").attr("id", "progress"));

                // animate the progress..
                $("#progress").width("101%").delay(800).fadeOut(2000, function() {
                    // ..then remove it.
                    $(this).remove();
                });
            }
        }
    </script>
@endpush
