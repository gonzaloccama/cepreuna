<div class="iq-search-bar">
    <form action="#" class="searchbox">
        <input type="text" class="text search-input" wire:model="keySearch" wire.keydown.enter="updateKeySearch"
               placeholder="Escriba aquí para buscar...">
        <a class="search-link" href="javascript:;" wire:click.prevent="updateKeySearch">
            <i class="ri-search-line"></i>
        </a>
    </form>
</div>

