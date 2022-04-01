<div class="row">
    <?php
    $dt = [
        'col' => [
            'title' => 'col-4',
            'group' => 'col-4',
            'order' => 'col-1',
            'status' => 'col-2',

            'not' => 'col-2',
        ],
        'model' => 'parent', 'value' => 'title' //parent for model
    ];

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

