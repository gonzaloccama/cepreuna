<form class="parsley-examples">

    <?php
    $dt = [
        'name' => 'website_facebook_page',
        'text' => 'URL de la página Facebook',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_media_social.0.facebook',
        'text' => 'Facebook',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_media_social.0.twitter',
        'text' => 'Twitter',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_media_social.0.linkedin',
        'text' => 'Linkedin',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <?php
    $dt = [
        'name' => 'website_media_social.0.whatsapp',
        'text' => 'WhatsApp',
        'required' => 1,
        'type' => 'text-h',
    ];
    ?>
    @include('livewire.widgets.form.input', $dt)

    <hr>

    <div class="form-group row text-right">
        <div class="col-8 offset-4">
            <button type="reset" wire:click.prevent="closeFrame"
                    class="btn btn-primary waves-effect waves-light mr-1">
                <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
            </button>
            <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                    wire:click.prevent="mediaSocial(1)">
                <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
            </button>
        </div>
    </div>
</form>


