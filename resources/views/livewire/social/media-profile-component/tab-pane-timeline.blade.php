<div class="tab-pane fade {{ $tab_pane == 'timeline'?'active show':'' }}" id="timeline" role="tabpanel">
    <div class="iq-card-body p-0">
        <div class="row">
            <div class="col-lg-4">
                @include('livewire.social.media-profile-component.content-preferences')
            </div>
            <div class="col-lg-8 m-0 p-0">
                @livewire('social.media-posts-component', ['is_profile' => true, 'id' => $profile_id])
            </div>
        </div>
    </div>
</div>
