<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $name_document }}</h4>

            <hr>

            <form class="parsley-examples">
                <?php
                $dt = [
                    'name' => 'name_document',
                    'text' => 'Nombre del documento',
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
                    'name' => 'category_document',
                    'text' => 'Categoria del documento',
                    'required' => 1,
                    'type' => 'category',
                    'options' => \App\Models\CategoryDocument::all(),
                ];
                ?>
                @include('livewire.widgets.form.select', $dt)


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
