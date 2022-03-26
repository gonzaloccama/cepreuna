<!-- Begin Project Area -->
<div class="project-area py-115">
    @php
        $result = \App\Models\CycleAcademy::find($viewDetailID);

        $pattern_url = '~[a-z]+://\S+~';
        $isUrl = '';
        if (preg_match_all($pattern_url, $result->image, $out)) {
            $isUrl = $out[0];
        }
    @endphp
    <div class="container card rounded-0 shadow">
        <div class="card-body">
            <div class="col-md-12 row pt-3 pb-3">
                <div class="text-left col-md-6">
                    <h5 class="text-uppercase">{{$result->cicle}}</h5>
                </div>
                <div class="text-right col-md-6">
                    <button class="btn  rounded-0 btn-primary-hover" type="button" wire:click.prevent="cleanDetails">
                        <i class="iconsminds-to-left"></i> Regresar
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6" style="text-align: justify !important;">
                    @if($isUrl == '')
                        <img src="{{ asset('assets/images/project/medium-size/').'/'.$result->image }}"
                             alt="{{ $result->cicle }}" class="img-fluid border-secondary">
                    @else
                        <img src="{{ $isUrl[0] }}"
                             alt="{{ $result->cicle }}" class="img-fluid border-secondary">
                    @endif
                </div>
                <div class="col-xl-6 col-lg-6" style="text-align: justify !important;">
                    <h5 class="mb-2">Estado</h5>
                    @php
                        $status = Carbon\Carbon::now() <= $result->finish_register;
                        $status = (int)$result->status && $status;
                    @endphp
                    <span
                        class="badge font-size-16 {{ $status?' text-success badge-success-1' :'text-danger badge-danger-1' }} rounded-0 mb-5">
                    {{ $status?'Habilitado':'Finalizado' }}</span>

                    <table class="table mt-5 table-hover">
                        <tr>
                            <th scope="col"><h5 style="font-weight: 400">Inicio de inscripciones</h5></th>
                            <td scope="col" class="text-right">{{ $this->dateSpanish($result->start_register) }}</td>
                        </tr>
                        <tr>
                            <th scope="col"><h5 style="font-weight: 400">Finalización de inscripciones</h5></th>
                            <td scope="col" class="text-right">{{ $this->dateSpanish($result->finish_register) }}</td>
                        </tr>
                        <tr>
                            <th scope="col"><h5 style="font-weight: 400">Inicio de clases</h5></th>
                            <td scope="col" class="text-right">{{ $this->dateSpanish($result->start_class) }}</td>
                        </tr>
                        <tr>
                            <th scope="col"><h5 style="font-weight: 400">Finalización de clases</h5></th>
                            <td scope="col" class="text-right">{{ $this->dateSpanish($result->finish_class) }}</td>
                        </tr>
                    </table>

                    <h5 class="mt-10 mb-2">Costos</h5>
                    {!! $result->price !!}

                    <h5 class="mt-10 mb-2">Turnos</h5>
                    {!! $result->horary !!}

                    <div class="mt-10 mb-2">
                        <div class="user-content mt-3">
                            <div class="button-wrap">
                                <a class="btn btn-custom btn-primary border-bottom btn-white-hover {{ !$status?'disabled':'' }}"
                                   href="{{ $result->go_link }}" target="_blank">Inscripciones</a>
                            </div>
                        </div>
                    </div>

                    <h5 class="mt-10 mb-2">Información Adicional</h5>
                    <div class="pt-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0 font-size-16 active" id="home-tab" data-toggle="tab"
                                   href="#home" role="tab"
                                   aria-controls="home" aria-selected="true">Requisitos</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0 font-size-16" id="profile-tab" data-toggle="tab"
                                   href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false">Quienes pueden inscribirse?</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0 font-size-16" id="contact-tab" data-toggle="tab"
                                   href="#contact" role="tab"
                                   aria-controls="contact" aria-selected="false">Ofrecemos</a>
                            </li>
                        </ul>
                        <div class="tab-content p-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <ul>
                                    <li>Pago al Banco de la Nación cuenta TASAS EDUCATIVAS 67 CEPREUNA, a nombre del
                                        estudiante con DNI original (no padres o apoderados), pagar un día antes de
                                        inscripción.
                                    </li>
                                    <li>Inscripción y/o matricula virtual en la página ( <a
                                            href="https://www.cepreuna.edu.pe">www.cepreuna.edu.pe</a> ).
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                Dirigido a estudiantes que culminaron la educación secundaria y que aspiran ingresar a
                                la Universidad.
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <ul>
                                    <li>Ofrecemos preparación de alto nivel.</li>
                                    <li>Plana docente calificada.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Project Area ENd Here -->
