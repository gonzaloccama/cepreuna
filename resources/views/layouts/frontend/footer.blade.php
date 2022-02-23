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
                        <?php
                        $socials = json_decode($settings->website_media_social);
                        ?>

                        @if(filled($socials[0]))
                            @foreach($socials[0] as $key => $social)
                                @if(isset($social) && !empty($social))
                                    <li class="{{ $key }}">
                                        <a href="{{ $key == 'whatsapp' ? 'https://api.whatsapp.com/send?phone=' . $social : $social }}"
                                           target="_blank" data-tippy="{{ ucfirst($key) }}" data-tippy-inertia="true"
                                           data-tippy-arrow="true" data-tippy-animation="shift-away"
                                           data-tippy-delay="50" data-tippy-theme="sharpborder">
                                            <i class="fa fa-{{ $key }}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-6 col-sm-8 align-self-center">
                    <?php
                    use App\Models\SystemSetting;use Illuminate\Support\Carbon;$dt = Carbon::now();
                    ?>
                    <div class="copyright">
                        <span class="copyright-text">© {{ $dt->year }} {{ $settings->website_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    {{-- chatbox.setAttribute("page_id", "2202093920029853"); --}}
    chatbox.setAttribute("page_id", "101410665199831");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

