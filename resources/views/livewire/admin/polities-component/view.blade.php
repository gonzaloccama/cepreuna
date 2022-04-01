<div class="row">

    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $title }}</h4>

            <hr>
            <div class="pt-1 pb-3">

                <div class="row">
                    <div class="col-xl-6">

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Título</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $title }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Fecha de publicación</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $this->dateSpanish($created_at, 'withtime') }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Estado</h5>
                            <p class="text-muted container font-13 mb-3">
                           <span class="rounded-0 badge {{ $status?'badge-success-1':'badge-danger-1' }}">
                                {{ $status?'Activo':'Inactivo' }}
                            </span>
                            </p>
                        </div>

                    </div> <!-- end col -->

                    <div class="col-xl-6 mt-2 mt-xl-0">
                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Política de privacidad</h5>
                            <p class="text-muted container font-13 mb-3">
                                {!! $privacy_policy !!}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Grupo</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $group }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Orden</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $order }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">

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
            </div>
        </div> <!-- end card-box -->
    </div><!-- end col-->

</div>
