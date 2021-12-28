<form class="parsley-examples">
    <?php
    $dt = [
        'name' => 'website_name',
        'text' => 'Nombre de la página',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_short_description',
        'text' => 'Descripción corta',
        'required' => 1,
        'type' => 1,
    ];
    ?>
    @include('livewire.widgets.form.textarea-not', $dt)

    <?php
    $dt = [
        'name' => 'website_executive',
        'text' => 'Presidente',
        'required' => 1,
        'type' => 'names',
        'options' => \App\Models\TeamMember::all(),
    ];
    ?>
    @include('livewire.widgets.form.select', $dt)

    <?php
    $dt = [
        'name' => 'website_phones.0',
        'text' => 'Telefonos',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_phones.1',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_phones.2',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_emails.0',
        'text' => 'Emails',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_emails.1',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_emails.2',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)


    <?php
    $dt = [
        'name' => 'website_addresses.0',
        'text' => 'Direcciones',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_addresses.1',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_addresses.2',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_addresses.3',
        'text' => '',
        'required' => 0,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    {{--    <?php--}}
    {{--    $dt = [--}}
    {{--        'name' => 'image',--}}
    {{--        'text' => 'Imagen',--}}
    {{--        'required' => 1,--}}
    {{--        'type' => 'file-h',--}}
    {{--    ];--}}
    {{--    ?>--}}
    {{--    @include('livewire.widgets.form.input', $dt)--}}


    <hr>

    <div class="form-group row text-right">
        <div class="col-8 offset-4">
            <button type="reset" wire:click.prevent="closeFrame"
                    class="btn btn-primary waves-effect waves-light mr-1">
                <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
            </button>
            <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                    wire:click.prevent="general(1)">
                <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
            </button>
        </div>
    </div>
</form>
