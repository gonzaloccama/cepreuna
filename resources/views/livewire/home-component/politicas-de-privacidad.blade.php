<!-- Begin Blog Area -->
<div class="blog-area py-55" style="background-image: linear-gradient(rgba(236,236,236,0.37), rgba(233,233,233,0.46))">
    <?php
    $faq_sections = \App\Models\FaqSection::all();
    ?>
    <div class="container">
        <div class="ml-md-0 mr-md-0 ml-4 mr-4">
            <div class="border_separator mb-5"></div>
            <div class="row">
                <div class="col-xl-5 col-lg-6 mt-1 pb-6 pb-lg-0">
                    <div class="section-title-wrap-2">
                        <div class="with-border border-0"> {{--section-title--}}
                            <h1 class="mb-7">Políticas de privacidad</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                    <p class="font-size-20 mb-0">{{ __('') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pb-5">
                    hola
                </div>
            </div>
            <div class="border_separator mt-4"></div>
        </div>
    </div>
</div>
<!-- Blog Area End Here -->
