@if($type)
    <div class="form-group row">
        <label for="{{ $name }}" class="col-4 col-form-label text-right text-uppercase">{{ $text }}
            {!! $required?'<i class="text-danger">*</i>':'' !!}
        </label>
        <div class="col-7">
                <textarea class="form-control" id="{{ $name }}" rows="5"
                          wire:model="{{ $name }}" placeholder="{{ $text }}"></textarea>
            @include('livewire.widgets.form.message-error')
        </div>
    </div>
@endif
