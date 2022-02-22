<div class="card-widgets">

    <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

    <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

</div>
<h4 class="header-title text-uppercase ">{{ $faq_section ? $faq_section : 'Añadir nuevo' }}</h4>

<hr>

<form class="parsley-examples pt-3 pb-3">
    <?php
    $dt = [
        'name' => 'faq_section',
        'text' => 'Sección',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)


    <hr>

    <div class="form-group row text-right">
        <div class="col-8 offset-4">
            <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                    wire:click.prevent="saveData">
                <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
            </button>
        </div>
    </div>
</form>
