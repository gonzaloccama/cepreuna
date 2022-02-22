<div class="row">
    <?php
    $dt = [
        'col' => [
            'faq_question' => 'col-5',
            'faq_section' => 'col-4',
            'faq_views' => 'col-1',
            'status' => 'col-1',

            'not' => 'col-1',
        ],
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
