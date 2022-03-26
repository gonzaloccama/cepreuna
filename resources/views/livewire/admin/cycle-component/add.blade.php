<div class="row">

    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $cicle }}</h4>

            <hr>

            <form class="parsley-examples">
                <?php
                $dt = [
                    'name' => 'cicle',
                    'text' => 'Nombre del Ciclo',
                    'required' => 1,
                    'type' => 'text-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'start_register',
                    'text' => 'Inicio de Inscripciones',
                    'required' => 1,
                    'type' => 'date-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'finish_register',
                    'text' => 'Fecha final de Inscripciones',
                    'required' => 1,
                    'type' => 'date-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'start_class',
                    'text' => 'Inicio de clases',
                    'required' => 1,
                    'type' => 'date-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'finish_class',
                    'text' => 'Culminación de clases',
                    'required' => 1,
                    'type' => 'date-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'go_link',
                    'text' => 'URL incripciones',
                    'required' => 1,
                    'type' => 'text-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'image',
                    'text' => 'Poster',
                    'required' => 1,
                    'required_mssg' => '774x1080',
                    'type' => 'file-h',
                    'file' => $image,
                    'editFile' => $editImage,
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'price',
                    'text' => 'Precios',
                    'required' => 1,
                    'type' => 1,
                ];
                ?>
                @include('livewire.widgets.form.textarea', $dt)

                <?php
                $dt = [
                    'name' => 'horary',
                    'text' => 'Horarios',
                    'required' => 1,
                    'type' => 1,
                ];
                ?>
                @include('livewire.widgets.form.textarea', $dt)

                <?php
                $dt = [
                    'name' => 'status',
                    'text' => 'Estado',
                    'required' => 0,
                    'type' => 'checkbox-h',
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
                                wire:click.prevent="saveData">
                            <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
                        </button>
                    </div>
                </div>
            </form>
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>
