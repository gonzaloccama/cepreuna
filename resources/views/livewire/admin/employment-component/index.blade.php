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
                $col = [
                    'title' => 'col-2',
                    'start_employments' => 'col-2',
                    'end_employments' => 'col-2',
                    'category' => 'col-2',
                    'created_at' => 'col-2',
                    'status' => 'col-1',
                    'not' => 'col-1',
                ]
            ?>

            @include('livewire.widgets.table.basic')
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
