<div class="iq-top-navbar bg-primary shadow">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="{{ route('social.home') }}">
                    <img src="{{ asset('assets/images/logo/logo-white.png') }}" class="img-fluid" alt="">
                    <span class="text-white font-size-16 font-rajdhani">Social</span>
                </a>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu text-white">
                        <div class="main-circle"><i class="ri-menu-line"></i></div>
                    </div>
                </div>
            </div>
            @livewire('social.media-header-search-component')
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li>
                        <a href="{{ route('social.profile') }}" class="iq-waves-effect d-flex align-items-center">
                            <?php
                            $img = auth()->user()->user_gender == 2 ? 'woman.png' : 'man.png';
                            $profile = auth()->user()->user_cover ? auth()->user()->user_cover : $img;
                            ?>
                            <img class="img-fluid rounded-circle mr-3" alt="user"
                                 src="{{ asset('assets/images/users/').'/'.$profile }}">
                            <div class="caption">
                                <h6 class="mb-0 line-height font-rajdhani font-size-16 text-white">{{ auth()->user()->fullname }}</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('social.home') }}"
                           class="iq-waves-effect d-flex align-items-center menu-social-color">
                            <i class="ri-home-fill"></i>
                            {{--                            <i class="ri-home-line"></i>--}}
                        </a>
                    </li>

                    @livewire('social.media-notifications')

                </ul>
                <ul class="navbar-list">
                    <li>
                        <a href="#" class="search-toggle menu-social-color iq-waves-effect d-flex align-items-center">
                            <i class="ri-arrow-down-s-fill"></i>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3 line-height">
                                        <h6 class="mb-0 text-white line-height">Hola {{ auth()->user()->fullname }}</h6>
                                        <span class="text-white font-size-12">disponible</span>
                                    </div>
                                    <a href="{{ route('social.profile') }}" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Mi perfil</h6>
                                                <p class="mb-0 font-size-12 text-muted">Ver detalles de perfil
                                                    personal.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('social.settings.profile') }}"
                                       class="iq-sub-card iq-bg-warning-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-warning">
                                                <i class="ri-profile-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Editar perfil</h6>
                                                <p class="mb-0 font-size-12 text-muted">Modifica tus datos
                                                    personales.</p>
                                            </div>
                                        </div>
                                    </a>
                                    {{--
                                    <a href="account-setting.html" class="iq-sub-card iq-bg-info-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-info">
                                                <i class="ri-account-box-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Account settings</h6>
                                                <p class="mb-0 font-size-12 text-muted">Manage your account parameters.</p>
                                            </div>
                                        </div>
                                    </a>
                                    --}}
                                    <a href="{{ route('social.settings.profile').'/?tab_pane=privacy' }}"
                                       class="iq-sub-card iq-bg-danger-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-danger">
                                                <i class="ri-lock-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Configuración de privacidad</h6>
                                                <p class="mb-0 font-size-12 text-muted">Controle sus parámetros de
                                                    privacidad.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                           role="button">
                                            Cerrar sesión<i class="ri-login-box-line ml-2"></i>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
