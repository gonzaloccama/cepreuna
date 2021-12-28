@if(!isset($setting) && empty($setting))
    <a class="dropdown-item" href="#"
       wire:click.prevent="openEdit({{ $item->id }}, true)">
        <i class="fe-eye"></i> Ver
    </a>
    <a class="dropdown-item" href="#"
       wire:click.prevent="openEdit({{ $item->id }})">
        <i class="fe-feather"></i> Editar</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item text-danger" href="#"
       wire:click.prevent="deleteConfirm('{{ $item->id }}')">
        <i class="fe-trash-2"></i> Eliminar
    </a>
@elseif(isset($setting) && !empty($setting))

    @if(in_array('go_post', $setting))
        <a class="dropdown-item" href="#"          >
            <i class="fe-arrow-right"></i> IR
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="#"
           wire:click.prevent="deleteConfirm('{{ $item->id }}')">
            <i class="fe-trash-2"></i> Eliminar
        </a>
    @endif
@endif
