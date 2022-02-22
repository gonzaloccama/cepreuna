<div class="pt-10 pb-10">
    <?php
    $others = App\Models\SystemSetting::find(1);
    ?>
    <div class="testimonial-area pt-5">
        <div class="container">
            <hr class="mt-2">
            <div class="row pt-1">
                <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                    <div class="section-title-wrap-2">
                        <div class="with-border border-0">
                            <h1 class="mb-7">OBJETIVO GENERAL</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 align-items-center" style="text-align: justify !important;">
                    <div class="about-content pl-0">
                        @if(isset($others->website_objectives) && !empty($others->website_objectives))
                            <ul class="list-item">
                                <li>
                                    <div class="list-icon pt-1">
                                        <i class="simple-icon-check" aria-hidden="true" style="font-size: 22px"></i>
                                    </div>
                                    <div class="list-text">
                                        <p class="font-size-20">{{ $others->website_objectives }}</p>
                                    </div>
                                </li>

                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    @if(filled(json_decode($others->website_values)))
        <div class="testimonial-area pt-5">
            <div class="container">

                <div class="row pt-1">
                    <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                        <div class="section-title-wrap-2">
                            <div class="with-border border-0">
                                <h2 class="mb-7">Objetivos Específicos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                        <div class="about-content pl-0">
                            <ul class="list-item">
                                @foreach(json_decode($others->website_values) as $objEs)
                                    <li class="p-0 m-0">
                                        <div class="list-icon pt-1">
                                            <i class="simple-icon-check" aria-hidden="true" style="font-size: 22px"></i>
                                        </div>
                                        <div class="list-text">
                                            <p class="font-size-20">
                                                {!! $objEs !!}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            </div>

        </div>
    @endif
</div>
