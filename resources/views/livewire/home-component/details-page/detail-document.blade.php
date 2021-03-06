<!-- Begin Project Area -->
<div class="project-area py-115">
    @php
        $result = \App\Models\Document::find($viewDetailID);
        $file_pattern_id = '/(file\/d\/)(.*)(\/)/';
        $idFileUrl = '';

        if (preg_match_all($file_pattern_id, $result->url, $matches)) {
             $idFileUrl = $matches[0];
        }
    @endphp
    <div class="container card rounded-0 shadow">
        <div class="card-body">
            <div class="col-md-12 row pt-3 pb-3">
                <div class="text-left col-md-6">
                    <h5>{{$result->name_document}}</h5>
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
                <object style="width:100%; height: 500px"
                        data="{{ asset('assets/files/documents/').'/'.$result->file }}?#zoom=auto&scrollbar=0&toolbar=1&navpanes=0">
                    <embed style="width:100%; height: 500px"
                           src="{{ asset('assets/files/documents/').'/'.$result->file }}?#zoom=auto&scrollbar=0&toolbar=1&navpanes=0">
                </object>
            @endif
        </div>
    </div>
</div>
<!-- Project Area ENd Here -->
