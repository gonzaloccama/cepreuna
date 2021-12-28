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
                'user_dni' => 'col-2',
                'fullname' => 'col-3',
                'phone' => 'col-2',
                'email' => 'col-2',
                'user_activated' => 'col-1',
                'created_at' => 'col-1',
                'not' => 'col-2',
            ];
            $img_path = 'assets/'.$image_path;
            ?>
            @include('livewire.widgets.table.basic')
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>


