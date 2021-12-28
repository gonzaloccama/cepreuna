@if($type)
    <div class="form-group row">
        <label for="{{ $name }}" class="col-4 col-form-label text-right text-uppercase">{{ $text }}
            {!! $required?'<i class="text-danger">*</i>':'' !!}
        </label>
        <div class="col-7">
            <select class="form-control" id="{{ $name }}" style="width: 100%"
                    wire:model="{{ $name }}">
                <option selected value="">Seleccione...</option>
                @if($type != 'array')
                    @foreach($options as $option)
                        <option value="{{ $option->id }}">{{ $option[$type] }}</option>
                    @endforeach
                @else
                    @foreach($options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                @endif
            </select>
            @include('livewire.widgets.form.message-error')
        </div>
    </div>
@endif
