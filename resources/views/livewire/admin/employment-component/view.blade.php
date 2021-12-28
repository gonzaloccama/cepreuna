<div class="row">

    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $title }}</h4>

            <hr>
            <div class="pt-1 pb-3">
                <div class="grid-container bg-light p-2 text-center mb-3">
                    <h4 class="p-0 m-0 text-uppercase font-weight-light">Información básica</h4>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Descripción</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $description }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Inicio de la convocatoria</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $this->dateSpanish($start_employments) }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Culminación de la convocatoria</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $this->dateSpanish($end_employments) }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">URL de inscripciones</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $go_link }}
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

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Fecha de publicación</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $this->dateSpanish($created_at, 'withtime') }}
                            </p>
                        </div>

                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">Categoria</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $category_employment }}
                            </p>
                        </div>

                    </div> <!-- end col -->

                    <div class="col-xl-6 mt-2 mt-xl-0">
                        <div class="pb-2">
                            <h5 class="h6 bg-light p-2 text-uppercase">URL del documento</h5>
                            <p class="text-muted container font-13 mb-3">
                                {{ $url }}
                            </p>
                        </div>

                        <div class="pb-2 text-center">
                            @include('livewire.widgets.preview-google-pdf', ['height' => 480, 'heading' => 1])
                            @if(!$url)
                                <div class="alert alert-danger bg-danger text-white border-0 rounded-0 pb-2"
                                     role="alert">
                                    URL del google drive no válido<strong> debe ser URL de Google Drive PDF</strong>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="pt-1 pb-3">
                <div class="grid-container bg-light p-2 text-center mb-3">
                    <h4 class="p-0 m-0 text-uppercase font-weight-light">Requisitos</h4>
                </div>
                <div class="row">
                    <div class="container ml-md-5 mr-md-5">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Requisito</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($requires as $key => $item)
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

            <div class="pt-1 pb-3">
                <div class="grid-container bg-light p-2 text-center mb-3">
                    <h4 class="p-0 m-0 text-uppercase font-weight-light">Cronograma</h4>
                </div>
                <div class="row">
                    <div class="container ml-md-5 mr-md-5">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Detalle</th>
                                    <th>Fecha</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($schedule as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item->detalle }}</td>
                                        <td>{{ $item->fecha }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->
                    </div>
                </div>
            </div>

            <div class="pt-1 pb-3">
                <div class="grid-container bg-light p-2 text-center mb-3">
                    <h4 class="p-0 m-0 text-uppercase font-weight-light">Archivos</h4>
                </div>
                <div class="row">
                    <div class="container ml-md-5 mr-md-5">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Descripción</th>
                                    <th>Archivo</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($files as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->file }}</td>
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
