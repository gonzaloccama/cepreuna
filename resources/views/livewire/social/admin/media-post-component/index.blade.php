<div class="row">
    <?php
    $col = [
        'id' => 'col-1',
        'fullname' => 'col-3',
        'post_type' => 'col-4',
        'created_at' => 'col-2',
        'not' => 'col-1',
    ];
    $setting = ['go_post', 'add' => 'none-new', 'created_at' => 'human'];
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



