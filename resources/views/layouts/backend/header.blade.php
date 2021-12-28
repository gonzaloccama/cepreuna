<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
        {{--
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                            <span class="float-right">
                                                <a href="" class="text-light">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-1.jpg') }}"
                                         class="img-fluid rounded-circle" alt=""/></div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-4.jpg') }}"
                                         class="img-fluid rounded-circle" alt=""/></div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>

                </li>
        --}}
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <?php
                $img = auth()->user()->user_gender == 2 ? 'woman.png' : 'man.png';
                $profile = auth()->user()->user_cover ? auth()->user()->user_cover : $img;
                ?>
                <img src="{{ asset('assets/images/users/').'/'.$profile }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ auth()->user()->fullname }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                       !Bienvenidos!
                    </h5>
                </div>

                <!-- item-->
                <a href="{{ route('social.profile') }}" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Mi cuenta</span>
                </a>

                <!-- item-->
                <a href="{{ route('social.settings.profile') }}" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Configurar</span>
                </a>

                <!-- item-->
{{--                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                    <i class="fe-lock"></i>--}}
{{--                    <span>Lock Screen</span>--}}
{{--                </a>--}}

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <span>Cerrar sesión</span>
                </a>

            </div>
        </li>

        {{--        <li class="dropdown notification-list">--}}
        {{--            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">--}}
        {{--                <i class="fe-settings noti-icon"></i>--}}
        {{--            </a>--}}
        {{--        </li>--}}


    </ul>

    <!-- LOGO -->
    <div class="logo-box" style="background-color: #011d30 !important;">
        <a href="{{ route('admin.dashboard') }}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="" height="50">
                            <!-- <span class="logo-lg-text-light">Upvex</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="" height="30">
                        </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>
    </ul>
</div>
