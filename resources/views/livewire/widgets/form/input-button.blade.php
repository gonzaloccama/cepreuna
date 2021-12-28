@if($type)
    <div class="form-group row">
        <label for="{{ str_replace('.','',$name) }}"
               class="col-4 col-form-label text-right text-uppercase">{{ $text }}
            {!! $required?'<i class="text-danger">*</i>':'' !!}
        </label>
        <div class="col-7">
            @if($type == 'btn-o-h')
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ $text }}"
                           id="{{ str_replace('.','',$name) }}"
                           wire:model="{{ $name }}">
                    <div class="input-group-append">
                        <button class="btn btn-{{ $btn }} waves-effect waves-light" wire:click.prevent="{{ $method }}"
                                type="button">
                            {{ $btn == 'danger'?'quitar':'agregar' }}
                        </button>
                    </div>
                </div>
            @elseif($type == 'btn-t-h')
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ $text }}"
                           id="{{ str_replace('.','',$name) }}" wire:model="{{ $name }}">
                    <input type="text" class="form-control range-schedule" placeholder="{{ $textS }}" wire:model="{{ $nameS }}">
                    <div class="input-group-append">
                        <button class="btn btn-{{ $btn }} waves-effect waves-light" wire:click.prevent="{{ $method }}"
                                type="button">
                            {{ $btn == 'danger'?'quitar':'agregar' }}
                        </button>
                    </div>
                </div>
            @elseif($type == 'btn-tt-h')
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ $text }}"
                           id="{{ str_replace('.','',$name) }}" wire:model="{{ $name }}">
                    <input type="text" class="form-control" placeholder="{{ $textS }}" wire:model="{{ $nameS }}">
                    <div class="input-group-append">
                        <button class="btn btn-{{ $btn }} waves-effect waves-light" wire:click.prevent="{{ $method }}"
                                type="button">
                            {{ $btn == 'danger'?'quitar':'agregar' }}
                        </button>
                    </div>
                </div>
            @endif
            @include('livewire.widgets.form.message-error')
        </div>
    </div>
@endif
