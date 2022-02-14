@if($type)
    <div class="form-group row">
        <label for="{{ $name }}" class="col-4 col-form-label text-right text-uppercase">{{ $text }}
            <?php
                $txt = '';
                if (isset($required_mssg) && !empty($required_mssg)){
                    $txt = '<span class="text-danger font-10">(resolución: <b>'.$required_mssg.'</b>)</span>';
                }
            ?>
            {!! $required ? $txt . '<i class="text-danger">*</i>':'' !!}
        </label>
        <div class="col-7">
            @if($type == 'text-h')
                <input type="text" class="form-control" wire:model="{{ $name }}"
                       id="{{ $name }}" placeholder="{{ $text }}">
            @elseif($type == 'date-h')
                <input type="text" class="form-control" id="{{ $name }}"
                       wire:model="{{ $name }}" placeholder="{{ $text }}">
            @elseif($type == 'checkbox-h')
                <input type="checkbox" checked data-plugin="switchery" data-color="#003559" id="{{ $name }}"
                       wire:model="{{ $name }}">
            @elseif($type == 'file-h')
                <div class="input-group rounded-0">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="{{ $name }}" wire:model="{{ $name }}" accept="image/jpeg,image/png,image/jpg">
                        <label class="custom-file-label" for="{{ $name }}">Elije una imagen</label>
                    </div>
                </div>
            @elseif($type == 'btn-h')
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ $text }}" id="{{ $name }}"
                           wire:model="{{ $name }}">
                    <div class="input-group-append">
                        <button class="btn btn-{{ $btn }} waves-effect waves-light" wire:click.prevent="{{ $method }}" type="button">
                            {{ $btn == 'danger'?'quitar':'agregar' }}
                        </button>
                    </div>
                </div>
            @endif
            @if($type == 'file-h')
                <div wire:loading wire:target="{{ $name }}" class="mt-1 text-danger font-italic">
                    Cargando...
                </div>
            @endif
            @include('livewire.widgets.form.message-error')
            @if($type == 'file-h')
                @if($file && $type == 'file-h')
                    <img src="{{ $file->temporaryUrl() }}"
                         class="img-thumbnail img-responsive mt-2 rounded shadow"
                         alt="" width="240">
{{--                @elseif($newImage && $type == 'file-h')--}}
{{--                    <img src="{{ $newImage->temporaryUrl() }}"--}}
{{--                         class="img-thumbnail img-responsive mt-2 rounded shadow"--}}
{{--                         alt="" width="240">--}}
                @elseif($editFile && $type == 'file-h')
                    <img src="{{ asset('assets'.'/'.$image_path).'/'.$editFile }}"
                         class="img-thumbnail img-responsive mt-2 rounded shadow"
                         alt="" width="240">
                @endif
            @endif
        </div>
    </div>
@endif
