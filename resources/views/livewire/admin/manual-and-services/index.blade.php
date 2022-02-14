<div class="row">
    <?php
    $dt = [
        'col' => [
            'image' => 'col-2',
            'text' => 'col-auto',
            'url' => 'col-auto',
            'order' => 'col-2',

            'not' => 'col-1',
        ],
    ];
    $img_path = 'assets/'.$image_path;
    ?>
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                @include('livewire.widgets.table.tools')
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            @include('livewire.widgets.table.basic', $dt)
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
