<div class="mt-2 mb-2">

    <span>{!! __('Mostrando') !!}</span>
    <span class="font-medium">{{ $paginator->firstItem() }}</span>
    <span>{!! __('a') !!}</span>
    <span class="font-medium">{{ $paginator->lastItem() }}</span>
    <span>{!! __('de') !!}</span>
    <span class="font-medium">{{ $paginator->total() }}</span>
    <span>{!! __('resultados') !!}</span>

</div>
