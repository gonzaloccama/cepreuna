<div class="footer-area">
    <?php
    $settings = \App\Models\SystemSetting::find(1);
    ?>
    <div class="footer-top pt-10 pb-10" style="background-image: linear-gradient(#00365a, #00365A)">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="widget-item text-hawkes-blue">
                        <div class="footer-logo pb-5">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="Cepreunap Logo"
                                     style="height: 80px">
                            </a>
                        </div>
                        <p class="short-desc font-size-16 mb-5 text-justify">{{ $settings->website_short_description }}</p>
                        <div class="inquary">
                            <h5 class="text-primary">Para consultas</h5>
                            <a href="tel:{{ str_replace(' ', '', json_decode($settings->website_phones)[0]) }}">
                                {{ json_decode($settings->website_phones)[0] }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-sm-6 pl-xl-80 pt-8 pt-lg-0">
                    <div class="widget-item">
                        <?php
                        $page = $settings->website_facebook_page ? $settings->website_facebook_page : 'https://www.facebook.com/facebook';
                        ?>
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href={{ urlencode($page) }}&tabs=timeline&width=340&height=360&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1611044149071760"
                            width="340" height="360" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 ps-lg-10 pt-8 pt-lg-0">
                    <div class="widget-item">
                        {{--                        <h3 class="heading text-white mb-6">Quick Links</h3>--}}
                        {{--                        <ul class="widget-list-item text-hawkes-blue">--}}
                        {{--                            <li>--}}
                        {{--                                <a href="#">Support Center</a>--}}
                        {{--                            </li>                          --}}
                        {{--                        </ul>--}}
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 pt-8 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="heading text-white mb-6">Información de Contacto</h3>
                        <div class="widget-list-item text-hawkes-blue">
                            <div class="widget-address pb-5">
                                @foreach(json_decode($settings->website_addresses) as $address)
                                    <p class="mb-1">{{ $address }}</p>
                                @endforeach
                                <hr>
                                {{--                                    <span class="text-primary">New York, USA</span>--}}
                                @foreach(json_decode($settings->website_phones) as $phone)
                                    <p class="mb-1"><a href="tel:051363684">{{ $phone }}</a></p>
                                @endforeach
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3 text-hawkes-blue" data-bg-color="#00225a">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <ul class="social-link">
                        <li class="facebook">
                            <a href="#" data-tippy="Facebook" data-tippy-inertia="true"
                               data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                               data-tippy-theme="sharpborder">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="#" data-tippy="Twitter" data-tippy-inertia="true"
                               data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                               data-tippy-theme="sharpborder">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="whatsapp">
                            <a href="#" data-tippy="Whatsapp" data-tippy-inertia="true"
                               data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                               data-tippy-theme="sharpborder">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-8 align-self-center">
                    <?php
                    use Illuminate\Support\Carbon;$dt = Carbon::now();
                    ?>
                    <div class="copyright">
                        <span class="copyright-text">© {{ $dt->year }} {{ $settings->website_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
