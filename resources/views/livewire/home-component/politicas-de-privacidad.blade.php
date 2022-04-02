<!-- Begin Blog Area -->
<div class="blog-area py-55" style="background-image: linear-gradient(rgba(236,236,236,0.37), rgba(233,233,233,0.46))">
    <?php
    $polities = \App\Models\PrivacyPolicy::whereNull('group')->get();
    ?>
    <div class="container">
        <div class="ml-md-0 mr-md-0 ml-4 mr-4">
            <div class="border_separator mb-5"></div>
            @foreach($polities as $policy)
                <div class="row">
                    <div class="col-xl-5 col-lg-6 mt-1 pb-6 pb-lg-0">
                        <div class="section-title-wrap-2">
                            <div class="with-border border-0"> {{--section-title--}}
                                <h1 class="mb-7">{{ $policy->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 pb-5 text-justify">
                        {!! $policy->privacy_policy !!}
                    </div>
                </div>

                @foreach($policy->children as $pol)
                    <div class="container ml-2 ml-md-5 mr-5">
                        <div class="section-title-wrap-2">
                            <div class="with-border border-0"> {{--section-title--}}
                                <h3 class="mb-7" style="font-weight: 500;">{{ $pol->title }}</h3>
                            </div>
                        </div>
                        <div class="row mr-md-5 mr-2">
                            <div class=" pb-5 text-justify">
                                {!! $pol->privacy_policy !!}
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="border_separator mt-4"></div>
            @endforeach

        </div>
    </div>
</div>
<!-- Blog Area End Here -->
