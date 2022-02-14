<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $text }}</h4>

            <hr>

            <div class="row">
                <div class="col-xl-6">
                    <div class="pb-2">
                        <h5 class="h6 bg-light p-2 text-uppercase">Título</h5>
                        <p class="text-muted container font-13 mb-3">
                            {{ $text }}
                        </p>
                    </div>

                    <div class="pb-2">
                        <h5 class="h6 bg-light p-2 text-uppercase">URL</h5>
                        <p class="text-muted container font-13 mb-3">
                            <a href="{{ $url }}">{{ $url }}</a>
                        </p>
                    </div>

                    <div class="pb-2">
                        <h5 class="h6 bg-light p-2 text-uppercase">Orden</h5>
                        <p class="text-muted container font-13 mb-3">
                            {{ $order }}
                        </p>
                    </div>


                    <div class="pb-2">
                        <h5 class="h6 bg-light p-2 text-uppercase">Fecha de publicación</h5>
                        <p class="text-muted container font-13 mb-3">
                            {{ $this->dateSpanish($created_at, 'withtime') }}
                        </p>
                    </div>

                </div> <!-- end col -->

                <div class="col-xl-6 mt-5 mt-xl-0">
                    <div class="pb-2 text-center">
                        <h5 class="h6 bg-light p-2 text-uppercase">Vista previa de la imagen</h5>
                        <img src="{{ asset('assets'.'/'.$image_path).'/'.$editImage }}"
                             class="img-thumbnail img-responsive mt-2 rounded shadow"
                             alt="" width="360">
                    </div>
                </div>

                <hr>

                <div class="col-md-12 text-right">
                    <button type="reset" wire:click.prevent="closeFrame"
                            class="btn btn-primary waves-effect waves-light mr-1">
                        <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                    </button>
                    <button type="reset" wire:click.prevent="deleteConfirm({{ $itemId }})"
                            class="btn btn-danger waves-effect waves-light mr-1">
                        <b><i class="fe-trash-2"></i>&nbsp;&nbsp;Eliminar</b>
                    </button>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                            wire:click.prevent="openEdit({{ $itemId }})">
                        <b><i class="fe-save"></i>&nbsp;&nbsp;Editar</b>
                    </button>
                </div>
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>

</div>




