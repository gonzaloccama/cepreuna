<div class="row">
    @push('title'){{ $_title }}@endpush
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @php
                        $_title_frame = [
                            'index' => '',
                            'add' => 'Agregar',
                            'edit' => 'Editar',
                            'view' => 'Vizualización',
                        ];
                    @endphp
                    @if($frame == 'index' || !in_array($frame, array_keys($_title_frame)))
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $_title }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="" wire:click.prevent="closeFrame">{{ $_title }}</a></li>
                        <li class="breadcrumb-item active">{{ $_title_frame[$frame] }}</li>
                    @endif
                </ol>
            </div>
            <h4 class="page-title text-uppercase">{{ $_title }}</h4>
        </div>
    </div>
</div>
