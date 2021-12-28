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
                    'cicle' => 'col-3',
                    'start_register' => 'col-auto',
                    'finish_register' => 'col-auto',
                    'status' => 'col-2',
                    'not' => 'col-1',
                ],
            ];
            ?>
            @include('livewire.widgets.table.basic', $dt)
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
