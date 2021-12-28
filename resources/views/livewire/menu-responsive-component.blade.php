<div class="mobile-menu_wrapper" id="mobileMenu">
    <?php
    //    $menus = \App\Models\SystemMenu::with('children')->where('type', 'page')->where('parent', 0)->get();

    $menus = \App\Models\SystemMenu::orderBy('order')->with('children', function ($query) {
        $query->orderBy('order');
    })->where('type', 'page')->where('parent', 0)->get();
    ?>
    <div class="offcanvas-body">
        <div class="inner-body">
            <div class="offcanvas-top">
                <a href="#" class="button-close"><i class="ion-ios-close-empty"></i></a>
            </div>
            <div class="offcanvas-menu_area">
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">

                        @foreach($menus as $menu)
                            <li class="{{ count($menu->children)?'menu-item-has-children':'' }}">
                                <a href="#"
                                   @if($menu->is_route)
                                   wire:click.prevent="updateMenu('{{ $menu->page }}', '{{ $menu->name }}')"
                                    @endif>
                                        <span class="mm-text">{{ $menu->name }}
                                            @if(count($menu->children))
                                                <i class="ion-ios-arrow-down"></i>
                                            @endif
                                    </span>
                                </a>
                                @if(count($menu->children))
                                    <ul class="sub-menu">
                                        @foreach($menu->children as $sub_menu)
                                            <li>
                                                <a href="#"
                                                   wire:click.prevent="updateMenu('{{ $sub_menu->page }}', '{{ $sub_menu->name }}')">
                                                    <span class="mm-text">{{ $sub_menu->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
