<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="card-widgets">

                <a href=""><i class="mdi mdi-refresh" wire:click.prevent="cleanItems"></i></a>

                <a href="" wire:click.prevent="closeFrame"><i class="mdi mdi-close"></i></a>

            </div>
            <h4 class="header-title text-uppercase">{{ $faq_question }}</h4>

            <hr>

            <form class="parsley-examples">
                <?php
                $dt = [
                    'name' => 'faq_question',
                    'text' => 'Pregunta',
                    'required' => 1,
                    'type' => 'text-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)


                <?php
                $i = 1;
                $dt = [
                    'name' => 'faq_answers.0',
                    'text' => 'Respuesta 1',
                    'required' => 1,
                    'type' => 'btn-o-h',
                    'btn' => 'primary',
                    'method' => "addInput(" . $itIn . ")",
                ];
                ?>
                @include('livewire.widgets.form.input-button', $dt)

                @foreach($inInputs as $key => $value)
                    <?php
                    $dt = [
                        'name' => 'faq_answers.' . "$value",
                        'text' => 'Respuesta ' . ++$i,
                        'required' => 1,
                        'type' => 'btn-o-h',
                        'btn' => 'danger',
                        'method' => "removeInput(" . $key . "," . $value . ")",
                    ];
                    ?>
                    @include('livewire.widgets.form.input-button', $dt)
                @endforeach

                <?php
                $dt = [
                    'name' => 'faq_section_faq',
                    'text' => 'Sección',
                    'required' => 1,
                    'type' => 'faq_section',
                    'options' => \App\Models\FaqSection::all(),
                ];
                ?>
                @include('livewire.widgets.form.select', $dt)

                <?php
                $dt = [
                    'name' => 'status',
                    'text' => 'Estado',
                    'required' => 0,
                    'type' => 'checkbox-h',
                ];
                ?>
                @include('livewire.widgets.form.input', $dt)

                <hr>

                <div class="form-group row text-right">
                    <div class="col-8 offset-4">
                        <button type="reset" wire:click.prevent="closeFrame"
                                class="btn btn-primary waves-effect waves-light mr-1">
                            <b><i class="fe-corner-up-left"></i>&nbsp;&nbsp;Regresar</b>
                        </button>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-1"
                                wire:click.prevent="saveData">
                            <b><i class="fe-save"></i>&nbsp;&nbsp;Guardar</b>
                        </button>
                    </div>
                </div>
            </form>
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>
