<div>
    <?php
    $menus = \App\Models\SystemMenu::orderBy('order')->where('type', 'footer')->get();
    ?>
    <h3 class="heading text-white mb-6">Páginas</h3>
    <ul class="widget-list-item text-hawkes-blue">
        @foreach($menus as $menu)
            <li>
                <a href="javascript:;" wire:click.prevent="updateMenu('{{ $menu->page }}', '{{ $menu->name }}')">
                    {{ $menu->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
