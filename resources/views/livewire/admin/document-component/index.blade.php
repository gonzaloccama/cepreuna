<div class="row">
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
            <?php
            $dt = [
                'col' => [
                    'name_document' => 'col-5',
                    'url' => 'col-2',
                    'category' => 'col-2',
                    'created_at' => 'col-2',
                    'not' => 'col-1',
                ]
            ];
            ?>

            @include('livewire.widgets.table.basic', $dt)
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
