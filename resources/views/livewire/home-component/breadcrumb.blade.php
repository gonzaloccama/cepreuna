<!-- Begin Breadcrumb Area -->
<div class="breadcrumb-area breadcrumb-height"
     style="background-image:linear-gradient(rgba(1,5,21,0.57), rgba(1,5,21,0.9)), url('{{ asset('assets/images/breadcrumb/bg/2.jpg') }}'); background-size: cover">
    <div class="container">
        <div class="breadcrumb-content">
            <b class="breadcrumb-sub-title text-white"><a href="{{ route('home') }}">Inicio</a></b>
            @if($viewDetailID && $details)
                @php
                    $subtitle = '';
                    switch ($details){
                        case 'detail-document':
                            $subtitle = \App\Models\Document::find($viewDetailID)->name_document;break;
                        case 'detail-employment':
                            $subtitle = \App\Models\Employment::find($viewDetailID)->title;break;
                        case 'detail-statement':
                            $subtitle = \App\Models\Statement::find($viewDetailID)->title;break;
                        case 'detail-cycle':
                            $subtitle = \App\Models\CycleAcademy::find($viewDetailID)->cicle;break;
                        case 'detail-post':
                            $subtitle = \App\Models\Post::find($viewDetailID)->title;break;
                    }
                @endphp
                <h1 class="breadcrumb-title mb-1 text-white">
                    <a href="" wire:click.prevent="cleanDetails" class="text-capitalize">{{ ucwords($title) }}</a>
                    <span class="breadcrumb-subtitle text-capitalize"> /
                        {{ ucwords(strlen($subtitle) >= 23 ? substr($subtitle, 0,23).'...':substr($subtitle, 0,23)) }}
                    </span>
                </h1>
            @else
                <h1 class="breadcrumb-title mb-1 text-white text-capitalize">{{ str_replace('-', ' ', $title) }}</h1>
            @endif

        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
