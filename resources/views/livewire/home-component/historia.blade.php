<!-- Begin Testimonial Area -->
<div class="testimonial-area pt-10 pb-10">
    <?php
    $settings = \App\Models\SystemSetting::find(1);
    ?>
    <div class="container">
        <hr class="mt-2">
        <div class="row pt-1">
            <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                <div class="section-title-wrap-2">
                    <div class="with-border border-0">
                        <h1 class="mb-7">HISTORIA</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                <p class="font-size-20 mb-0">{!! $settings->website_history !!}</p>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Testimonial Area End Here -->
