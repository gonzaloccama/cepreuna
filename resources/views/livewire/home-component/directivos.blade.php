<!-- Begin Team Area -->
<div class="team-area pt-10 pb-10">
<?php
    $teams = \App\Models\TeamMember::where('status', '1')->get();
?>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-xl-5 col-lg-6 pb-6 pb-lg-0">
                <div class="section-title-wrap-2">
                    <div class="with-border border-0"> {{--section-title--}}
                        <h1 class="mb-7">DIRECTIVOS DE LA COMISIÓN</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6" style="text-align: justify !important;">
                <p class="font-size-20 mb-0">{{ __('') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container team-member-slider-1">
                    <div class="swiper-wrapper">

                        @foreach($teams as $team)
                            <div class="swiper-slide">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img class="img-full" src="{{ asset('assets/images/team/').'/'.$team->image }}"
                                             alt="Team Member">
                                        <ul class="add-action text-white">
                                            <li class="team-social-link-wrap">
                                                <a href="#">
                                                    <i class="fa fa-share-alt"></i>
                                                </a>
                                                <ul class="social-link">
                                                    <li class="facebook">
                                                        <a href="#" data-tippy="Facebook" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="twitter">
                                                        <a href="#" data-tippy="Twitter" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="instagram">
                                                        <a href="#" data-tippy="Instagram" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mail-wrap">
                                                <a class="text-lowercase" href="mailto://info@example.com">
                                                    <i class="ion-ios-plus-empty"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="team-content">
                                        <h3 class="title mb-1">{{ $team->names }}</h3>
                                        <span class="occupation text-uppercase">{{ $team->title }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="team-pagination d-md-none"></div>

                    <!-- Add Arrows -->
                    <div class="team-button-next"></div>
                    <div class="team-button-prev"></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Team Area End Here -->
