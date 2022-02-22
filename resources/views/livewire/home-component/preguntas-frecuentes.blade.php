<!-- Begin Blog Area -->
<div class="blog-area py-55" style="background-image: linear-gradient(rgba(236,236,236,0.37), rgba(233,233,233,0.46))">
    <?php
    $faq_sections = \App\Models\FaqSection::all();
    ?>
    <div class="container">
        <div class="section-title-area pb-10">
            <div class="section-title with-border pb-5 pb-lg-0">
                <h2 class="mb-0 font-size-50">Preguntas <br> frecuentes</h2>
            </div>
            <div class="section-banner text-white align-self-center p-7"
                 style="background-image: url('{{ asset('assets/images/banner/inner-bg/1-1.png') }}'); background-size: cover;">
                <h2 class="info mb-0">Nuestras sección de preguntas frecuentes.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" wire:ignore>
                @foreach($faq_sections as $section)
                    <?php
                    $faqs = \App\Models\Faq::where('faq_section_faq', $section->id)
                        ->where('status', '1')->orderBy('faq_views', 'desc')->get();
                    ?>
                    @if(filled($faqs) && isset($faqs))
                        <div class="col-xl-5 col-lg-6 ml-0 pl-0 pb-0 mb-0 mt-10">
                            <div class="section-title-wrap-2">
                                <div class="with-border border-0">
                                    <h2 class="mb-2" style="font-weight: 400;">{{ $section->faq_section }}</h2>
                                </div>
                            </div>
                        </div>

                        <div style="visibility: hidden; position: absolute; width: 0px; height: 0px;">
                            <svg xmlns="http://www.w3.org/2000/svg">
                                <symbol viewBox="0 0 24 24" id="expand-more">
                                    <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </symbol>
                                <symbol viewBox="0 0 24 24" id="close">
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </symbol>
                            </svg>
                        </div>
                        @foreach($faqs as $faq)
                            <?php
                            $answers = json_decode($faq->faq_answers);
                            ?>
                            @if(filled($answers) && isset($answers))
                                <details>
                                    <summary class="font-rajdhani" wire:click="addReadFAQ({{ $faq->id }})">
                                        {{ $faq->faq_question }}
                                        <svg class="control-icon control-icon-expand" width="24" height="24"
                                             role="presentation">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more"/>
                                        </svg>
                                        <svg class="control-icon control-icon-close" width="24" height="24"
                                             role="presentation">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"/>
                                        </svg>
                                    </summary>
                                    <div class="pt-3" style="text-align: justify !important;">
                                        <div class="about-content pl-0">
                                            <ul class="list-item pl-5">
                                                @foreach($answers as $answer)
                                                    <li class="p-0 m-0">
                                                        <div class="list-icon">
                                                            <i class="simple-icon-check" aria-hidden="true"
                                                               style="font-size: 22px"></i>
                                                        </div>
                                                        <div class="list-text pt-1">
                                                            <p class="font-size-20">{{ $answer }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>

                                    </div>

                                </details>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End Here -->
