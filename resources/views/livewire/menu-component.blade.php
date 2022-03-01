<?php

$menus = \App\Models\SystemMenu::orderBy('order')->with('children', function ($query) {
    $query->orderBy('order');
})->where('type', 'page')->where('parent', 0)->get();

?>
<div class="container">
    <div class="main-header_nav">
        <div class="row align-items-center">
            <div class="offset-xl-2 col-xl-10 d-none d-lg-block">
                <div class="main-menu text-center">
                    <nav class="main-nav">
                        <ul>
                            <?php
                            $iter = 0;
                            ?>
                            @foreach($menus as $menu)
                                <li class="drop-holder {{ $menu->page == $_menu ? 'active-menu' : '' }}">
                                    <a href="javascript:;"
                                       @if($menu->is_route)
                                       wire:click.prevent="updateMenu('{{ $menu->page }}', '{{ $menu->name }}')"
                                        @endif>
                                        <span>{{ $menu->name }}</span>
                                        @if(count($menu->children))
                                            <ul class="drop-menu">
                                                @foreach($menu->children as $sub_menu)
                                                    <li class="">
                                                        <a href="javascript:;"
                                                           class="{{ $sub_menu->page == $_menu ?'active-sub-menu':'' }}"
                                                           wire:click.prevent="updateMenu('{{ $sub_menu->page }}', '{{ $sub_menu->name }}')">
                                                            {{ $sub_menu->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </a>
                                </li>

                            @endforeach

                            <li class="separator-vertical"></li>

                        {{--                                <li class="hassub-item-wrap d-none d-lg-inline-flex">--}}
                        {{--                                    <ul class="hassub-item">--}}
                        {{--                                        <li class="search-wrap hassub">--}}
                        {{--                                            <a href="#" class="search-btn">--}}
                        {{--                                                <i class="simple-icon-magnifier"></i>--}}
                        {{--                                            </a>--}}
                        {{--                                            <ul class="hassub-body search-body">--}}
                        {{--                                                <li>--}}
                        {{--                                                    <form class="search-form" action="#">--}}
                        {{--                                                        <div class="form-field">--}}
                        {{--                                                            <input class="input-field" type="search"--}}
                        {{--                                                                   name="Search" placeholder="Buscar...">--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="form-btn_wrap">--}}
                        {{--                                                            <button--}}
                        {{--                                                                class="btn btn-secondary btn-primary-hover rounded-0">--}}
                        {{--                                                                <i class="simple-icon-magnifier"></i>--}}
                        {{--                                                            </button>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </form>--}}
                        {{--                                                </li>--}}
                        {{--                                            </ul>--}}
                        {{--                                        </li>--}}

                        {{--                                    </ul>--}}
                        {{--                                </li>--}}

                        <!-- simple-icon-user text-white -->
                            <li class="hassub-item-wrap">
                                @if (Route::has('login'))

                                    <div class="dropdown">

                                        <a type="text" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false" class="btn btn-login p-1 pb-0 m-0">
                                            <i class="simple-icon-user text-white"></i>
                                            <span class="font-rajdhani-16">login</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right p-1 mt-5"
                                             aria-labelledby="dropdownMenuButton">
                                            @auth
                                                @if(auth()->user()->role == 1)
                                                    <a href="#"
                                                       class="hover-user row align-items-center"
                                                       wire:click.prevent="goUrl('admin.users')">
                                                        <i class="simple-icon-grid col-2"></i>
                                                        <div class="col-8 text-left align-middle">
                                                            Panel Admin
                                                        </div>
                                                    </a>
                                                @endif
                                                <a href="#" class="hover-user row align-items-center"
                                                   wire:click.prevent="goUrl('social.home')">
                                                    <i class="simple-icon-speech col-2"></i>
                                                    <div class="col-8 text-left align-middle">
                                                        Media Social
                                                    </div>
                                                </a>
                                                <a href="#" class="hover-user row align-items-center"
                                                   wire:click.prevent="goUrl('logout')">
                                                    <i class="simple-icon-logout col-2"></i>
                                                    <div class="col-8 text-left align-middle">
                                                        Cerrar
                                                    </div>
                                                </a>
                                            @else
                                                <a href="#" class="hover-user row align-items-center"
                                                   wire:click.prevent="goUrl('login')">
                                                    <i class="simple-icon-login col-2"></i>
                                                    <div class="col-8 text-left align-middle">
                                                        login
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </li>

                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-logo-wrap d-none d-lg-flex" wire:ignore>
        <div class="header-fixed-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo/logo.png') }}" id="logo-image" alt="Cepreunap"
                     style="height: 75px; padding-left: 20px">
            </a>
        </div>
    </div>
</div>

