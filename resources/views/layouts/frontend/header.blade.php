<header class="main-header_area position-relative">
    <?php
    $settings = \App\Models\SystemSetting::find(1);
    $phone = json_decode($settings->website_phones)[0];

    ?>
    <div class="header-top py-4 py-lg-2" data-bg-color="#eaf5ff">
        <div class="container">
            <div class="row align-items-center">
                <div class="offset-xl-2 offset-lg-2 col-xl-7 col-lg-7 d-none d-lg-block">
                    <div class="header-top-left ml-0 pl-0">
                        <div class="contact-number" style="font-size: 13px">
                            <img src="{{ asset('assets/images/header/icon/phone.png') }}" alt="Phone Icon">
                            <a href="tel:{{ str_replace(' ', '', $phone) }}">{{ $phone }}</a>
                        </div>
                        <div class="contact-number" style="font-size: 13px">
                            <img src="{{ asset('assets/images/header/icon/globe-grid.png') }}" alt="Address Icon">
                            <span>{{ json_decode($settings->website_addresses)[0] }}</span>
                        </div>
                        <div class="contact-number" style="font-size: 13px">
                            <img src="{{ asset('assets/images/header/icon/email-1.png') }}" alt="Clock Icon">
                            <a href="mailto:informes@cepreuna.edu.pe">{{ json_decode($settings->website_emails)[0] }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-block d-lg-none">
                    <div class="header-logo d-flex">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/').'/'.$settings->website_logo_1st }}"
                                 alt="{{ $settings->website_name }}"
                                 style="height: 75px; padding-left: 20px">
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-4">
                    <div class="header-top-right">
                        <ul class="hassub-item">

                            <li class="login-info text-right" style="font-size: 13px">
                                <a href="javascript:;">Presidente<span
                                        class="text-secondary">: {{ $settings->executive->names }}</span></a>
                            </li>
                            {{--
                                                        <li class="search-wrap hassub d-block d-lg-none">
                                                            <a href="#" class="search-btn">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                            <ul class="hassub-body search-body">
                                                                <li>
                                                                    <form class="search-form" action="#">
                                                                        <div class="form-field">
                                                                            <input class="input-field" type="search" placeholder="Buscar...">
                                                                        </div>
                                                                        <div class="form-btn_wrap">
                                                                            <button type="submit" value="submit" id="submit"
                                                                                    class="btn btn-secondary btn-primary-hover rounded-0"
                                                                                    name="submit">
                                                                                <i class="fa fa-search"></i>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </li>
                            --}}
                            <li class="search-wrap hassub d-block d-lg-none" style="display: flex">
                                @if (Route::has('login'))

                                    <div class="dropdown">
                                        <a type="text" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="simple-icon-user text-secondary"></i> <b class="font-13 align-middle">Login</b>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right p-1"
                                             aria-labelledby="dropdownMenuButton">
                                            @auth
                                                @if(auth()->user()->role == 1)
                                                    <div
                                                        class="hover-user row align-items-center"
                                                        onclick="location.href='{{ route('admin.users') }}';">
                                                        <i class="simple-icon-grid col-2"></i>
                                                        <div class="col-8 text-left align-middle">
                                                            Panel Admin
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="hover-user row align-items-center"
                                                     onclick="location.href='{{ route('social.home') }}';">
                                                    <i class="simple-icon-speech col-2"></i>
                                                    <div class="col-8 text-left align-middle">
                                                        Media Social
                                                    </div>
                                                </div>
                                                <div class="hover-user row align-items-center"
                                                     onclick="location.href='{{ route('logout') }}'; event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          class="d-none">
                                                        @csrf
                                                    </form>
                                                    <i class="simple-icon-logout col-2"></i>
                                                    <div class="col-8 text-left align-middle">
                                                        Cerrar
                                                    </div>
                                                </div>
                                            @else
                                                <div class="hover-user row align-items-center"
                                                     onclick="location.href='{{ route('login') }}';">
                                                    <i class="simple-icon-login col-2"></i>
                                                    <div class="col-8 text-left align-middle">
                                                        login
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                @endif
                            </li>
                            <li class="mobile-menu_wrap d-block d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                    <i class="fa fa-navicon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header header-sticky" id="sticky" style="background-image: linear-gradient(#00365a, #00365A);">
        @livewire('menu-component')
    </div>
    @livewire('menu-responsive-component')

    <div class="global-overlay"></div>
</header>
