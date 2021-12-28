<div class="row">
    <?php
    $col = [
        'image' => 'col-3',
        'title' => 'col-4',
        'created_at' => 'col-3',
        'status' => 'col-1',
        'not' => 'col-1',
    ];

    $img_path = 'assets/'.$image_path;
//    $setting = ['go_post', 'add' => 'none-new', 'created_at' => 'human'];
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
            @include('livewire.widgets.table.basic')
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>




