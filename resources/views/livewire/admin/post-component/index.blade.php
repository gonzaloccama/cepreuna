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
                'image' => 'col-2',
                'title' => 'col-2',
                'category' => 'col-2',
                'fullname' => 'col-2',
                'status' => 'col-1',
                'created_at' => 'col-2',
                'not' => 'col-1',
            ];
            $img_path = 'assets/'.$image_path;
            ?>
            @include('livewire.widgets.table.basic')
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>

