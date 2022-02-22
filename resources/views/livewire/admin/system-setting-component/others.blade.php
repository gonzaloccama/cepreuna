
<form class="parsley-examples">

    <?php
    $dt = [
        'name' => 'website_objectives',
        'text' => 'Objetivos General',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_values.0',
        'text' => 'Objetivo Especifico 1',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_values.1',
        'text' => 'Objetivo Especifico 2',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_values.2',
        'text' => 'Objetivo Especifico 3',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_values.3',
        'text' => 'Objetivo Especifico 4',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_values.4',
        'text' => 'Objetivo Especifico 5',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_values.5',
        'text' => 'Objetivo Especifico 6',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_history',
        'text' => 'História',
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
                    wire:click.prevent="others(1)">
                <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
            </button>
        </div>
    </div>
</form>
