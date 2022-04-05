<!-- Begin Project Area -->
<div class="project-area pt-10 pb-10">
    @php
        $employments = \App\Models\Employment::orderBy('end_employments', 'desc')->where('status', '1')->paginate($employmentLoadMore);
    @endphp
    <div class="container">
        <div class="row card rounded-0">
            <div class="col-lg-12 card-body shadow p-10">
                <div class="custom-arrow-holder position-relative pb-2">
                    @if($employments->count() > 0)
                        <ul class="list-item">
                            @foreach($employments as $employment)
                                <li class="pt-1 pb-1">
                                    <div class="testimonial-content pt-3 pb-3 pl-5 pr-3 shadow-sm">
                                        <div class="user-info align-items-center">
                                            <div class="user-img">
                                                <time datetime="{{ $employment->created_at }}" class="calendar-edit">
                                                    <em>{{ $this->dateSpanish($employment->created_at, '') }}</em>
                                                    <strong>
                                                        <e style="font-size: 8px;">{{ $this->dateSpanish($employment->created_at, 'year') }}</e>
                                                        {{ $this->dateSpanish($employment->created_at, 'month') }}
                                                    </strong>
                                                    <span>{{ $this->dateSpanish($employment->created_at, 'day') }}</span>
                                                </time>
                                            </div>
                                            <div class="user-content">
                                                <a href=""
                                                   wire:click.prevent="details({{ $employment->id }},'employment')">
                                                    <h5 class="text-primary font-size-25 mb-0">{{ $employment->title }}</h5>
                                                </a>
                                                <span class="user-occupation">{{ $employment->description }}</span>
                                                <br>
                                                <span class="blog-meta d-block border-1">
                                                    <?php
                                                    echo ucfirst(Carbon\Carbon::parse($employment->start_employments)
                                                        ->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i A')) . ' &mdash; ' .
                                                    ucfirst(Carbon\Carbon::parse($employment->end_employments)
                                                        ->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i A'))
                                                    ?>
{{--                                                {{ $this->dateSpanish($employment->start_employments) }} - {{ $this->dateSpanish($employment->end_employments) }}--}}
                                            </span>
                                                <u class="blog-meta d-block font-italic"
                                                   style="font-size: 16px; color: #00365A;">
                                                    {{ $employment->category->category }}
                                                </u>
                                                <div class="blog-meta d-block font-italic">
                                                    @php
                                                    $status = Carbon\Carbon::now() <= $employment->end_employments;
                                                    $status = (int)$employment->status && $status;
                                                    @endphp
                                                    <span
                                                        class="badge {{ $status?' text-success badge-success-1' :'text-danger badge-danger-1' }} rounded-0">
                                                    {{ $status?'Activo':'Cerrado' }}</span>
                                                </div>
                                                {{--                                            <button class="btn btn-primary rounded-0">LEER MAS</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <div class="button-wrap button-position-center pt-10">
                                @if(count($employments) >=  $employmentLoadMore)
                                    <a class="btn btn-custom btn-primary btn-secondary-hover"
                                       wire:click.prevent="employmentLoadMore" href="#">Cargar más...</a>
                                @endif
                            </div>
                        </ul>
                    @else
                        <div class="user-info align-items-center">
                            <div class="user-content">
                                <a href="javascript:;" class="text-center">
                                    <h5 class="text-primary font-size-25 mb-0" style="font-weight: 500">{{ __('¡Aun no tenemos convocatorias!') }}</h5>
                                    <div class="user-occupation">{{ __('Cuando tengamos convocatorias se pubicaran aqui...') }}</div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Area ENd Here -->
