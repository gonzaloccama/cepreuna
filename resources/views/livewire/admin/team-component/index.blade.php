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
                'image' => 'col-1',
                'title' => 'col-2',
                'names' => 'col-2',
                'email' => 'col-4',
                'status' => 'col-2',
                'not' => 'col-1',
            ];
            $img_path = 'assets/'.$image_path;
            ?>
            @include('livewire.widgets.table.basic')
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>


