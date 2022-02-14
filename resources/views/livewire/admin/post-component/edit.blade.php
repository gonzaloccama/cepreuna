<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $title }}</h4>

            <hr>

            <form class="parsley-examples">
                <?php
                $dt = [
                    'name' => 'title',
                    'text' => 'Título de la noticia',
                    'required' => 1,
                    'type' => 'text-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'short_description',
                    'text' => 'Descripción corta',
                    'required' => 1,
                    'type' => 1,
                ];
                ?>
                @include('livewire.widgets.form.textarea', $dt)


                <?php
                $dt = [
                    'name' => 'description',
                    'text' => 'Contenido',
                    'required' => 1,
                    'type' => 1,
                ];
                ?>
                @include('livewire.widgets.form.textarea', $dt)

                <?php
                $dt = [
                    'name' => 'newImage',
                    'text' => 'Imagen',
                    'required' => 1,
                    'required_mssg' => '720x520',
                    'type' => 'file-h',
                    'file' => $newImage,
                    'editFile' => $editImage,
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <?php
                $dt = [
                    'name' => 'category_post',
                    'text' => 'Categoria de la noticia',
                    'required' => 1,
                    'type' => 'category',
                    'options' => \App\Models\PostCategory::all(),
                ];
                ?>
                @include('livewire.widgets.form.select', $dt)


                <?php
                $dt = [
                    'name' => 'tags',
                    'text' => 'Tags',
                    'required' => 0,
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

                <hr>

                <div class="form-group row text-right">
                    <div class="col-8 offset-4">
                        <button type="reset" wire:click.prevent="closeFrame"
                                class="btn btn-primary waves-effect waves-light mr-1">
                            <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                        </button>
                        <button type="reset" wire:click.prevent="deleteConfirm({{ $itemId }})"
                                class="btn btn-danger waves-effect waves-light mr-1">
                            <b><i class="fe-trash-2"></i>&nbsp;&nbsp;Eliminar</b>
                        </button>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                                wire:click.prevent="updateRegister">
                            <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar cambios</b>
                        </button>
                    </div>
                </div>
            </form>
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>
