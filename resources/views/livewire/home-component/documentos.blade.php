<!-- Begin Document Area -->
<div class="project-area pt-10 pb-10">
    @php
        $documents = \App\Models\Document::orderBy('name_document', 'asc')->paginate($documentLoadMore);
    @endphp
    <div class="container">
        <div class="row card rounded-0">
            <div class="col-lg-12 card-body shadow p-10">
                <div class="custom-arrow-holder position-relative pb-2">
                    @if($documents->count() > 0)
                        <ul class="list-item">
                            @foreach($documents as $document)
                                <li class="pt-1 pb-1">
                                    <div class="testimonial-content pt-3 pb-3 pl-5 pr-3 shadow-sm">
                                        <div class="user-info align-items-center">
                                            <div class="user-img">
                                                <i class="iconsminds-folder-open" style="font-size: 40px"></i>
                                            </div>
                                            <div class="user-content">
                                                <a href=""
                                                   wire:click.prevent="details({{$document->id}}, 'document')">
                                                    <h5 class="text-primary font-size-25 mb-0">{{ $document->name_document }}</h5>
                                                </a>
                                                <span class="user-occupation">{{ $document->description }}</span>
                                                <div class="blog-meta d-block"
                                                     style="font-size: 16px; color: #00365A; font-style: italic;">
                                                    <a href=""
                                                       style="border: 1px dashed #00365A; padding-left: 3px; padding-right: 3px;"
                                                       wire:click.prevent="details({{$document->id}}, 'detail-document')">
                                                        Ver documento</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <div class="button-wrap button-position-center pt-10">
                                @if(count($documents) >=  $documentLoadMore)
                                    <a class="btn btn-custom btn-primary btn-secondary-hover"
                                       wire:click.prevent="documentLoadMore" href="#">Cargar más...</a>
                                @endif
                            </div>
                        </ul>
                    @else
                        <div class="user-info align-items-center">
                            <div class="user-content">
                                <a href="javascript:;" class="text-center">
                                    <h5 class="text-primary font-size-25 mb-0"
                                        style="font-weight: 500">{{ __('¡Aun no existe documento pubicados!') }}</h5>
                                    <div
                                        class="user-occupation">{{ __('Cuando tengamos publicado documentos podrás verlo aquí...') }}</div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Document Area ENd Here -->
