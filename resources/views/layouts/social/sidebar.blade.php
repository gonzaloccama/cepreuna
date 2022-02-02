<div class="iq-sidebar">
    <?php
    $menus = \App\Models\SystemMenu::orderBy('order')->with('children', function ($query) {
        $query->orderBy('order');
    })->where('type', 'social')->where('parent', 0)->get();

    $img = auth()->user()->user_gender == 2 ? 'woman.png' : 'man.png';
    $profile = auth()->user()->user_cover ? auth()->user()->user_cover : $img;
    ?>

    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @foreach($menus as $menu)
                    <li class="{{ request()->route()->getName() == $menu->route ? 'active' : '' }}">
                        <a href="{{ (int)$menu->is_route?route($menu->route):__('#').$menu->name }}"
                           class="iq-waves-effect collapsed"
                           @if(count($menu->children)) data-toggle="collapse" aria-expanded="false" @endif>
                            {{--                            <i class="{{ $menu->menu_icon }}"></i>--}}
                            @if($menu->route != 'social.profile')
                                @include('livewire.widgets.icon-regex.find-icon', ['icon' => $menu->menu_icon, 'width' => 30])
                            @else
                                <img src="{{ asset('assets/images/users/').'/'.$profile }}" class="img-fluid rounded-circle" alt="" width="30">
                            @endif
                            <span style="margin-left: 5px;" class="font-rajdhani-16 weight-500">{{ $menu->name }}</span>
                            @if(count($menu->children))
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            @endif
                        </a>
                        @if(count($menu->children))
                            <ul id="{{ $menu->name }}" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle"
                                style="background-color: rgba(0,123,181,0.06);">
                                @foreach($menu->children as $smenu)
                                    @if($smenu->route != 'admin.users' || auth()->user()->role == 1)
                                        <li class="{{ request()->route()->getName() == $smenu->route ? 'active' : '' }}">
                                            <a href="{{ route($smenu->route) }}"
                                               style="font-size: 12px;">
                                                @include('livewire.widgets.icon-regex.find-icon', ['icon' => ':%icon=transfer%:', 'width' => 20])
                                                <span>{{ $smenu->name }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>

                @endforeach
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
