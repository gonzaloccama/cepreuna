<form class="parsley-examples">

    <?php
    $dt = [
        'name' => 'website_mission',
        'text' => 'Misión',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_vision',
        'text' => 'Visión',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <hr>

    <div class="form-group row text-right">
        <div class="col-8 offset-4">
            <button type="reset" wire:click.prevent="closeFrame"
                    class="btn btn-primary waves-effect waves-light mr-1">
                <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
            </button>
            <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                    wire:click.prevent="missionAndVision(1)">
                <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
            </button>
        </div>
    </div>
</form>

