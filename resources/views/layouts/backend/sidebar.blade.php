<div class="left-side-menu" style="background-color: #011d30 !important;">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <?php
            $sections = \App\Models\SystemMenu::where('type', 'admin')->groupBy('section')->pluck('section');
            ?>
            <ul class="metismenu" id="side-menu">
                @foreach($sections as $s)
                    <?php
                    $menus = \App\Models\SystemMenu::with('children')->where('section', $s)
                        ->where('type', 'admin')->where('parent', 0)->get();
                    ?>
                    <li class="menu-title">{{ $s }}</li>
                    @foreach($menus as $menu)
                        <li class="">
                            <a href="{{ $menu->is_route?route($menu->route):'javascript:;' }}">
                                <i class="{{ $menu->menu_icon }}"></i>
                                <span> {{ $menu->name }} </span>
                                @if(count($menu->children))
                                    <span class="menu-arrow"></span>
                                @endif
                            </a>
                            @if(count($menu->children))
                                <ul class="nav-second-level bg-sub-menu s-menu" aria-expanded="false">
                                    @foreach($menu->children as $sMenu)
                                        <li>
                                            <a href="{{ route($sMenu->route) }}" class="active">
                                                <i class="fe-activity pr-1"></i>
                                                {{ $sMenu->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
