<!-- Begin Project Area -->
<div class="project-area py-115">
    @php
        $result = \App\Models\Employment::where('status', '1')->where('id', $viewDetailID)->first();
        $schedules = json_decode($result->schedule);
        $files = json_decode($result->files);
    @endphp
    <div class="container card rounded-0 shadow">
        <div class="card-body">
            <div class="col-md-12 row pt-3 pb-3">
                <div class="text-left col-md-6">
                    <h5 class="text-uppercase">{{$result->title}}</h5>
                </div>
                <div class="text-right col-md-6">
                    <button class="btn  rounded-0 btn-primary-hover" type="button" wire:click.prevent="cleanDetails">
                        <i class="iconsminds-to-left"></i> Regresar
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5" style="text-align: justify !important;">
                    <h5 class="mt-10 mb-2">
                        {{ $this->dateSpanish($result->start_employments) }}
                        - {{ $this->dateSpanish($result->end_employments) }}
                    </h5>
                    <p class="font-size-16 mb-0">{{ $result->description }}</p>
                    <h5 class="mt-10 mb-2">Cronograma</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">DETALLES</th>
                            <th scope="col">FECHA</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <th scope="row">{{ $schedule->detalle }}</th>
                                <td>{{ $schedule->fecha }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <h5 class="mt-10 mb-2">Requisitos</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">REQUISITO</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(json_decode($result->requires) as $key => $require)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $require }}</td>
                            </tr>
                        @endforeach
                    </table>

                    @if(Carbon\Carbon::now() <= Carbon\Carbon::create($result->end_employments)->addHours(24))
                        <div class="mt-10 mb-2">
                            <div class="user-content mt-3">
                                <div class="button-wrap">
                                    <a class="btn btn-custom btn-primary border-bottom btn-white-hover"
                                       href="{{ $result->go_link }}" target="_blank">Pre-inscripciones</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <h5 class="mt-10 mb-2">Resultados</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">DESCRIPCIÓN</th>
                            <th scope="col">ARCHIVO</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <th scope="row">{{ $file->descripcion }}</th>
                                <td><a href="{{ $file->file }}" target="_blank">Ver archivo</a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
                <div class="col-xl-7 col-lg-7" style="text-align: justify !important;">
                    <h5 class="mt-10 mb-2">Estado</h5>
                    <?php
                    $status = Carbon\Carbon::now() <= Carbon\Carbon::create($result->end_employments)->addHours(24);
                    $status = (int)$result->status && $status;
                    ?>
                    <span
                        class="badge {{ $status?' text-success badge-success-1' :'text-danger badge-danger-1' }} rounded-0 mb-5">
                    {{ $status?'Activo':'Finalizado' }}</span>
                    @if($result->is_url)
                        @include('livewire.widgets.view-drive-page', ['url_pdf' => $result->url])
                    @else
                        <object style="width:100%; height: 600px"
                                data="{{ asset('assets/files/employment/').'/'.$result->file_employment }}?#zoom=auto&scrollbar=0&toolbar=1&navpanes=0"
                        >
                            <embed
                                src="{{ asset('assets/files/employment/').'/'.$result->file_employment }}?#zoom=auto&scrollbar=0&toolbar=1&navpanes=0"
                            >
                        </object>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Area ENd Here -->
