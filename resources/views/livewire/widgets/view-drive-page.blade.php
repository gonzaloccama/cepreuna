<?php
$file_pattern_id = '/(file\/d\/)(.*)(\/)/';
$idFileUrl = '';

if (preg_match($file_pattern_id, $url_pdf, $matches)) {
    $idFileUrl = $matches[2];
}
?>

@if($idFileUrl)
    <object style="width:100%; height: 500px" allowfullscreen sandbox
            data="https://drive.google.com/file/d/{{ $idFileUrl }}/preview?usp=sharing&embedded=true">
        <embed style="width:100%; height: 500px;" allowfullscreen sandbox
               src="https://drive.google.com/file/d/{{ $idFileUrl }}/preview?usp=sharing&embedded=true">
    </object>

    <a href="https://drive.google.com/uc?export=download&id={{ $idFileUrl }}"
       class="pt-1 btn btn-link text-danger pb-2 pl-0" style="text-transform: uppercase;">
        <i class="simple-icon-cloud-download"></i> Descargar archivo
    </a>
@else
    <div class="alert alert-danger bg-danger text-white border-0 rounded-0 pb-2" role="alert">
        URL del google drive no válido<strong> posiblemente fue eliminada.</strong>
    </div>
@endif
