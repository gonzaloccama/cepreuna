<div class="pt-10 pb-10">
<?php
$settings = \App\Models\SystemSetting::find(1);
?>
    <!-- Begin Testimonial Area -->
    <div class="testimonial-area">
        <div class="container">
            <hr class="">
            <div class="row">
                <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                    <div class="section-title-wrap-2">
                        <div class=" with-border border-0">
                            <h1 class="mb-7">MISIÓN</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                    <p class="font-size-20 mb-0">{!! $settings->website_mission !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Area End Here -->
    <!-- Begin Testimonial Area -->
    <div class="testimonial-area pt-5">
        <div class="container">
            <hr class="">
            <div class="row">
                <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                    <div class="section-title-wrap-2">
                        <div class="with-border border-0"> {{-- section-title --}}
                            <h1 class="mb-7">VISIÓN</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                    <p class="font-size-20 mb-0">{!! $settings->website_vision !!}</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <!-- Testimonial Area End Here -->
</div>
