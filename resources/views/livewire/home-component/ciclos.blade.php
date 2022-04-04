<!-- Begin Project Area -->
<div class="project-area py-115">
    @php
        $cycles = \App\Models\CycleAcademy::orderBy('created_at', 'desc')->paginate($cycleLoadMore);
    @endphp
    <div class="container">
        <div class="row">
            @if($cycles->count() > 0)
                @foreach($cycles as $cycle)
                    @php
                        $pattern_url = '~[a-z]+://\S+~';
                        $isUrl = '';
                        if (preg_match_all($pattern_url, $cycle->image, $out)) {
                            $isUrl = $out[0];
                        }
                    @endphp
                    <div class="col-lg-4 col-sm-6 pb-6">
                        <div class="project-item shadow">
                            <a class="project-img" href="{{ route('home') }}"
                               wire:click.prevent="details({{ $cycle->id }},'cycle')">
                                @if($isUrl == '')
                                    <img src="{{ asset('assets/images/project/medium-size/').'/'.$cycle->image }}"
                                         alt="{{ $cycle->cicle }}">
                                @else
                                    <img src="{{ $isUrl[0] }}" alt="{{ $cycle->cicle }}">
                                @endif
                            </a>
                            <div class="project-content with-boxshadow style-2 p-3"
                                 style="background-color: white !important;">
                                <a href="" wire:click.prevent="details({{ $cycle->id }},'cycle')">
                                    <h5 class="title mb-0 pt-3">{{ $cycle->cicle }}</h5>
                                </a>
                                <hr>
                                <div class="" style="font-size: 14px;">
                                    <b class="sub-title"><u>INICIO DE INSCRIPCIONES</u>:
                                        <br> {{ $this->dateSpanish($cycle->start_register) }}</b>
                                    <hr>
                                    <b class="sub-title"><u>FINALIZACIÓN DE INSCRIPCIONES</u>:
                                        <br> {{ $this->dateSpanish($cycle->finish_register) }}</b>
                                    <hr>
                                    <b><u>INICIO DE CLASES</u>: <br> {{ $this->dateSpanish($cycle->start_class) }}</b>
                                    <hr>
                                    @php
                                        $status = Carbon\Carbon::now() <= Carbon\Carbon::create($cycle->finish_register)->addHours(24);
                                        $status = (int)$cycle->status && $status;
                                    @endphp
                                    @if($status)
                                        <div class="alert alert-success aler rounded-0 pb-3">
                                            <b>HABILITADO</b>
                                        </div>
                                    @else
                                        <div class="alert alert-danger rounded-0 pb-3">
                                            <b>CERRADO</b>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="button-wrap button-position-center pt-10">
                    @if(count($cycles) >=  $cycleLoadMore)
                        <a class="btn btn-custom btn-primary btn-secondary-hover" wire:click.prevent="cycleLoadMore"
                           href="#">Cargar más...</a>
                    @endif
                </div>
            @else
                <div class="user-info align-items-center">
                    <div class="user-content">
                        <a href="javascript:;" class="text-center">
                            <h5 class="text-primary font-size-25 mb-0" style="font-weight: 500">{{ __('¡Aun no tenemos ciclos aperturados!') }}</h5>
                            <div class="user-occupation">{{ __('Cuando tengamos ciclos aperturados se pubicaran aqui...') }}</div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Project Area End Here -->
