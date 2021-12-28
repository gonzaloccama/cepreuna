<div class="container">
    <div class="row card rounded-0">
        <div class="col-lg-12 card-header pt-5 pl-5">
            <h2>COMUNICADOS</h2>
        </div>
        <div class="col-lg-12 card-body shadow p-10">
            <div class="custom-arrow-holder position-relative">
                @if($statements->count() > 0)
                    <ul class="list-item">
                        @foreach($statements as $statement)
                            <li class="pt-1 pb-1">
                                <div class="testimonial-content pt-3 pb-3 pl-5 pr-3 shadow-sm">
                                    <div class="user-info align-items-center">
                                        <div class="user-img">
                                            <time datetime="{{ $statement->created_at }}" class="calendar-edit">
                                                <em>{{ $this->dateSpanish($statement->created_at, '') }}</em>
                                                <strong>
                                                    <e style="font-size: 8px;">{{ $this->dateSpanish($statement->created_at, 'year') }}</e>{{ $this->dateSpanish($statement->created_at, 'month') }}
                                                </strong>
                                                <span>{{ $this->dateSpanish($statement->created_at, 'day') }}</span>
                                            </time>
                                        </div>
                                        <div class="user-content">
                                            <a href=""
                                               wire:click.prevent="details({{ $statement->id }},'statement')">
                                                <h5 class="text-primary font-size-25 mb-0">{{ $statement->title }}</h5>
                                            </a>
                                            <span class="user-occupation">{{ $statement->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <div class="button-wrap button-position-center pt-10">
                            @if(count($statements) >=  $statementLoadMore)
                                <a class="btn btn-custom btn-primary btn-secondary-hover"
                                   wire:click.prevent="statementLoadMore" href="#">Cargar más...</a>
                            @endif
                        </div>
                    </ul>
                @else
                    <div class="user-info align-items-center">
                        <div class="user-content">
                            <a href="javascript:;" class="text-center">
                                <h5 class="text-primary font-size-25 mb-0" style="font-weight: 500">{{ __('¡Aun no existe comunicados!') }}</h5>
                                <div class="user-occupation">{{ __('Cuando tengamos comunicados se pubicaran aqui...') }}</div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
