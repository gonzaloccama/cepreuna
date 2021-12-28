<div class="row">

    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase pb-1">{{ $title }}</h4>
            <hr>

            <form class="parsley-examples">

                <div class="pt-1 pb-3">
                    <div class="grid-container bg-light p-2 text-center mb-3">
                        <h4 class="p-0 m-0 text-uppercase font-weight-light">Información básica</h4>
                    </div>

                    <?php
                    $dt = [
                        'name' => 'title',
                        'text' => 'Nombre de convocatoria',
                        'required' => 1,
                        'type' => 'text-h',
                    ];
                    ?>
                    @include('livewire.widgets.form.input', $dt)

                    <?php
                    $dt = [
                        'name' => 'description',
                        'text' => 'Descripción',
                        'required' => 1,
                        'type' => 1,
                    ];
                    ?>
                    @include('livewire.widgets.form.textarea', $dt)

                    <?php
                    $dt = [
                        'name' => 'url',
                        'text' => 'URL del documento',
                        'required' => 1,
                        'type' => 'text-h',
                    ];
                    ?>
                    @include('livewire.widgets.form.input', $dt)

                    <div class="row">
                        <div class="offset-md-4 col-md-7">
                            @include('livewire.widgets.preview-google-pdf', ['height' => 200, 'heading' => 0])
                        </div>
                    </div>

                    <?php
                    $dt = [
                        'name' => 'start_employments',
                        'text' => 'Inicio de la convocatoria',
                        'required' => 1,
                        'type' => 'date-h',
                    ];
                    ?>
                    @include('livewire.widgets.form.input', $dt)

                    <?php
                    $dt = [
                        'name' => 'end_employments',
                        'text' => 'Culminación de la convocatoria',
                        'required' => 1,
                        'type' => 'date-h',
                    ];
                    ?>
                    @include('livewire.widgets.form.input', $dt)

                    <?php
                    $dt = [
                        'name' => 'go_link',
                        'text' => 'Link de inscrpciones',
                        'required' => 1,
                        'type' => 'text-h',
                    ];
                    ?>
                    @include('livewire.widgets.form.input', $dt)

                    <?php
                    $dt = [
                        'name' => 'status',
                        'text' => 'Estado',
                        'required' => 0,
                        'type' => 'checkbox-h',
                    ];
                    ?>
                    @include('livewire.widgets.form.input', $dt)

                    <?php
                    $dt = [
                        'name' => 'category_employment',
                        'text' => 'Categoria',
                        'required' => 1,
                        'type' => 'category',
                        'options' => \App\Models\CategoryEmployment::all(),
                    ];
                    ?>
                    @include('livewire.widgets.form.select', $dt)
                </div>

                <div class="pt-1 pb-3">
                    <div class="grid-container bg-light p-2 text-center mb-3">
                        <h4 class="p-0 m-0 text-uppercase font-weight-light">Requisitos</h4>
                    </div>

                    <?php
                    $i = 1;
                    $dt = [
                        'name' => 'requires.0',
                        'text' => 'Requisito 1',
                        'required' => 1,
                        'type' => 'btn-o-h',
                        'btn' => 'primary',
                        'method' => "addRequires(" . $itRe . ")",
                    ];
                    ?>
                    @include('livewire.widgets.form.input-button', $dt)

                    @foreach($inRequires as $key => $value)
                        <?php
                        $dt = [
                            'name' => 'requires.' . "$value",
                            'text' => 'Requisito ' . ++$i,
                            'required' => 1,
                            'type' => 'btn-o-h',
                            'btn' => 'danger',
                            'method' => "removeRequires(" . $key . "," . $value . ")",
                        ];
                        ?>
                        @include('livewire.widgets.form.input-button', $dt)
                    @endforeach
                </div>

                <div class="pt-1 pb-3">
                    <div class="grid-container bg-light p-2 text-center mb-3">
                        <h4 class="p-0 m-0 text-uppercase font-weight-light">Cronograma</h4>
                    </div>
                    <?php
                    $e = 1;
                    $dt = [
                        'name' => 'schedule.0.detalle',
                        'nameS' => 'schedule.0.fecha',
                        'text' => 'Cronograma 1',
                        'textS' => 'Fecha',
                        'required' => 1,
                        'type' => 'btn-t-h',
                        'btn' => 'primary',
                        'method' => "addSchedule(" . $inSche . ")",
                    ];
                    ?>
                    @include('livewire.widgets.form.input-button', $dt)

                    @foreach($inSchedule as $skey => $svalue)
                        <?php
                        $dt = [
                            'name' => 'schedule.' . $svalue . '.detalle',
                            'nameS' => 'schedule.' . $svalue . '.fecha',
                            'text' => 'Cronograma ' . ++$e,
                            'textS' => 'Fecha',
                            'required' => 1,
                            'type' => 'btn-t-h',
                            'btn' => 'danger',
                            'method' => "removeSchedule(" . $skey . ", " . $svalue . ")",
                        ];
                        ?>
                        @include('livewire.widgets.form.input-button', $dt)
                    @endforeach
                </div>

                <div class="pt-1 pb-3">
                    <div class="grid-container bg-light p-2 text-center mb-3">
                        <h4 class="p-0 m-0 text-uppercase font-weight-light">Archivos y resultados</h4>
                    </div>
                    <?php
                    $f = 1;
                    $dt = [
                        'name' => 'files.0.descripcion',
                        'nameS' => 'files.0.file',
                        'text' => 'Descripción 1',
                        'textS' => 'URL del archivo',
                        'required' => 1,
                        'type' => 'btn-tt-h',
                        'btn' => 'primary',
                        'method' => "addFiles(" . $inFi . ")",
                    ];
                    ?>
                    @include('livewire.widgets.form.input-button', $dt)

                    @foreach($inFiles as $fkey => $fvalue)
                        <?php
                        $dt = [
                            'name' => 'files.' . $fvalue . '.descripcion',
                            'nameS' => 'files.' . $fvalue . '.file',
                            'text' => 'Descripción ' . ++$f,
                            'textS' => 'URL del archivo',
                            'required' => 1,
                            'type' => 'btn-tt-h',
                            'btn' => 'danger',
                            'method' => "removeFiles(" . $fkey . ", " . $fvalue . ")",
                        ];
                        ?>
                        @include('livewire.widgets.form.input-button', $dt)
                    @endforeach
                </div>

                <hr class="pb-2">

                <div class="form-group row text-right">
                    <div class="col-8 offset-4">
                        <button type="reset" wire:click.prevent="closeFrame"
                                class="btn btn-primary waves-effect waves-light mr-1">
                            <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                        </button>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                                wire:click.prevent="saveData">
                            <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
                        </button>
                    </div>
                </div>
            </form>


        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>
