<div class="row">

    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $faq_question }}</h4>

            <hr>
            <div class="pt-1 pb-3">

                <div class="row">
                    <div class="col-xl-6">

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Pregunta</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $faq_question }}
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
                           <span class="rounded-0 badge {{ (int)$status?'badge-success-1':'badge-danger-1' }}">
                                {{ (int)$status?'Activo':'Inactivo' }}
                            </span>
                            </p>
                        </div>

                    </div> <!-- end col -->

                    <div class="col-xl-6 mt-2 mt-xl-0">
                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Sección</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $faq_section_faq }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Leido</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $faq_views }} {{ $faq_views == 1 ? 'vez' : 'veces' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-1 pb-3">
                <div class="grid-container bg-light p-2 text-center mb-3">
                    <h4 class="p-0 m-0 text-uppercase font-weight-light">Respuestas a la pregunta</h4>
                </div>
                <div class="row">
                    <div class="container ml-md-5 mr-md-5">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Respuesta</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($faq_answers as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

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
