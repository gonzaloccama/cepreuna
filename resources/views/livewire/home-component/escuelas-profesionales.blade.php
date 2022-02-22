<div class="pt-10 pb-10">
    <!-- Begin Testimonial Area -->
    <div class="testimonial-area pt-5">
        <div class="container">
            <hr class="mt-2">
            <div class="row pt-1">
                <div class="col-xl-5 col-lg-6 pb-lg-0">
                    <div class="section-title-wrap-2">
                        <div class="with-border border-0 pt-5">
                            <h1 class="mb-7">ESCUELAS PROFESIONALES</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Testimonial Area End Here -->

    <!-- Begin Testimonial Area -->
    <div class="testimonial-area">
        <?php
        $colleges = \App\Models\College::all();
        ?>
        <div class="container">
            <hr>
            @foreach($colleges as $college)
                <?php
                $schools = json_decode($college->schools);
                ?>
                <div class="row pt-10">
                    <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                        <div class="section-title-wrap-2">
                            <div class="section-title with-border border-0">
                                <h3 class="mb-7" style="font-weight: 400;">{{ ucwords($college->college) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                        <div class="about-content pl-0">
                            <ul class="list-item">
                                @foreach($schools as $school)
                                    <li class="m-0 p-0">
                                        <div class="list-icon pt-1">
                                            <i class="simple-icon-check" aria-hidden="true" style="font-size: 22px"></i>
                                        </div>
                                        <div class="list-text">
                                            <p class="font-size-20">{{ $school }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                    <hr>
            @endforeach

        </div>

    </div>
    <!-- Testimonial Area End Here -->
</div>
