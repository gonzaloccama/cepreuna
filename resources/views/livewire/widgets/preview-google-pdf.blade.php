@php
    $pattern_url = '~[a-z]+://\S+~';
    $patternIdDrive = '~/d/\K[^/]+(?=/)~';
    $getIdDrive = '';

    if ($url) {
        if (preg_match_all($pattern_url, $url, $out)) {
            $findURL = $out[0];
            if (preg_match($patternIdDrive, $findURL[0], $outId)) {
                $getIdDrive = $outId;
            }
        }
    }
@endphp
@if($findURL[0])
    @if(str_contains($findURL[0], 'https://drive.google.com/file/d/') && $getIdDrive[0])
        @if(!$heading)
            <div class="text-muted mt-0 pt-0 pb-1 pl-1 font-italic">Vista previa del documento en drive</div>
        @else
            <h5 class="h6 bg-light p-2 text-uppercase">Vista previa del documento</h5>
        @endif
        <iframe src="{{ str_replace('view', 'preview', $findURL[0]) }}&embedded=true"
                style="width:100%; height:{{ $height }}px; border: 1px solid rgba(54,72,79,0.07);"                frameborder="0"></iframe>
        <a href="https://drive.google.com/uc?export=download&id={{ $getIdDrive[0] }}"
           class="pt-1 btn btn-link text-danger pb-2"> <i class="fe-download-cloud"></i> Descargar
            archivo...</a>
    @else
        <div class="alert alert-danger bg-danger text-white border-0 rounded-0 pb-2" role="alert">
            URL del google drive no válido<strong> debe ser URL de Google Drive PDF</strong>
        </div>
    @endif
@endif

