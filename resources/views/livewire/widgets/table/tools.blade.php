<div class="col-md-3 pt-1 pb-1">

    <div class="input-group">
        <input type="search" class="form-control" id="inputPassword2"
               placeholder="Buscar..." wire:model="keyWord">
        <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit">
                <i class="fe-search"></i>
            </button>
        </div>
    </div>

</div>

<div class="col-lg-9 text-md-right pt-1 pb-1">
    {{--<div class="btn-group">
        <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect"
                data-toggle="dropdown"
                aria-expanded="false">
            <i class="mdi mdi-folder font-18 align-middle"></i>
            <i class="mdi mdi-chevron-down"></i>
        </button>
        <div class="dropdown-menu">
            <span class="dropdown-header">Move to</span>
            <a class="dropdown-item" href="javascript: void(0);">Social</a>
            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
        </div>
    </div> --}}

    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect"
                data-toggle="dropdown"
                aria-expanded="false">
            Mostrando {{ $limit }}<i class="mdi mdi-chevron-down font-18 align-middle"></i>

        </button>
        <div class="dropdown-menu">
            <span class="dropdown-header">Mostrar por:</span>
            <a class="dropdown-item {{ $limit == 5 ? 'text-white bg-dark':'' }}"
               wire:click.prevent="updatePagination(5)" href="#">5</a>
            <a class="dropdown-item {{ $limit == 10 ? 'text-white bg-dark':'' }}"
               wire:click.prevent="updatePagination(10)" href="#">10</a>
            <a class="dropdown-item {{ $limit == 20 ? 'text-white bg-dark':'' }}"
               wire:click.prevent="updatePagination(20)" href="#">20</a>
            <a class="dropdown-item {{ $limit == 40 ? 'text-white bg-dark':'' }}"
               wire:click.prevent="updatePagination(40)" href="#">40</a>
            <a class="dropdown-item {{ $limit == 100 ? 'text-white bg-dark':'' }}"
               wire:click.prevent="updatePagination(100)" href="#">100</a>
        </div>
    </div>

        <div class="btn-group">
            <button href="#custom-modal" class="btn btn-dark waves-effect waves-light" wire:click.prevent="openAdd"
                    {{ !isset($setting['add']) && empty($setting['add'])?'':'hidden' }}
                    data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i
                    class="fe-plus-circle mr-1"></i> Nuevo
            </button>
        </div>

</div><!-- end col-->
