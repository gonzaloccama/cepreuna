<div class="row" wire:ignore>

    <?php
        $config = \App\Models\SystemSetting::find(1);


    ?>

    <div class="card-box col-12">
        {{--        <iframe src="https://dashboard.tawk.to/login" frameborder="0"></iframe>--}}
{{--        <iframe src="https://www.messenger.com/" width="100%" height="400" frameborder="0"--}}
{{--                referrerpolicy="origin-when-cross-origin" allowfullscreen></iframe>--}}
<p>{{ json_decode($config->website_media_social)[0]->facebook }}</p>
                <a href="{{ json_decode($config->website_media_social)[0]->facebook }}" class="btn btn-primary" target="_blank">Ver Página</a>
    </div> <!-- end card-box-->

</div>
