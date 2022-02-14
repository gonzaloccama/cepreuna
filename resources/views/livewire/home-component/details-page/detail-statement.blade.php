<!-- Begin Project Area -->
<div class="project-area py-115">
    @php
        $result = \App\Models\Statement::find($viewDetailID);
    @endphp
    <div class="container card rounded-0 shadow">
        <div class="card-body">
            <div class="col-md-12 row pt-3 pb-3">
                <div class="text-left col-md-6">
                    <h5>{{$result->title}}</h5>
                </div>
                <div class="text-right col-md-6">
                    <button class="btn  rounded-0 btn-primary-hover" type="button" wire:click.prevent="cleanDetails">
                        <i class="iconsminds-to-left"></i> Regresar
                    </button>
                </div>
            </div>

            @if($result->is_url)
                @include('livewire.widgets.view-drive-page', ['url_pdf' => $result->url])
            @else
                <object style="width:100%; height: 500px" allowfullscreen sandbox
                        data="{{ asset('assets/files/statement/').'/'.$result->file }}?"
                        >
                    <embed style="width:100%; height: 500px;" allowfullscreen sandbox
                        src="{{ asset('assets/files/statement/').'/'.$result->file }}"
                        >
                </object>
            @endif
            <div class="col-md-12 pt-5 pb-3">
                <div class="text-left">
                    <h5>Categoria:
                        <span class="font-italic font-size-20" style="font-weight: 500">{{$result->category->category}}</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Area ENd Here -->
