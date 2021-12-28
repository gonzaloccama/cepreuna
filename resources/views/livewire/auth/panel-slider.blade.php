<div class="sign-in-detail text-white" wire:ignore>
    <a class="sign-in-logo mb-3 bg-white p-4" href="#">
        <img src="{{ asset('assets/images/logo/logo.png') }}"
             class="img-fluid" alt="logo" style="width: 50%; height: 50%">
    </a>
    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
         data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1"
         data-items-mobile-sm="1" data-margin="0">
        <?php
        $sliders = \App\Models\systemSlider::where('status', '1')->orderBy('created_at', 'desc')->take(3)->get();
        ?>
        @foreach($sliders as $slider)
            <div class="item">
                <img src="{{ asset('assets/images/slider/'.'/'.$slider->image) }}" class="img-fluid mb-4" alt="logo">
                <h4 class="mb-1 text-white">{{ $slider->title }}</h4>
                <p>{{ $slider->text }}</p>
            </div>
        @endforeach
    </div>
</div>
