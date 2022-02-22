<div class="row">
    <?php
    $dt = [
        'col' => [
            'id' => 'col-2',
            'faq_section' => 'col-8',

            'not' => 'col-2',
        ],
    ];
    $setting = ['not_view', 'add' => 'none-new'];
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
    <div class="col-md-6">
        <div class="card-box">
            @include('livewire.admin.others.faq-section-component.' . $frame_inline)
        </div>
    </div>

    <div class="col-6">
        <div class="card-box">
            @include('livewire.widgets.table.basic', $dt)

        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>


