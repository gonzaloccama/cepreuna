
<form class="comment-text d-flex align-items-center mt-3">

    <textarea class="form-control iq-bg-primary media-comment" rows="1" wire:model="text"></textarea>

    <div class="comment-attagement d-flex pr-1">
        <a href="javascript:;"><i class="ri-link mr-3"></i></a>
        <a href="javascript:;"><i class="ri-user-smile-line mr-3"></i></a>
        <a href="javascript:;"><i class="ri-camera-line mr-3"></i></a>
        <button type="submit" class="btn btn-primary" wire:click.prevent="storePostsComment">
            <i class="ri-send-plane-2-fill"></i>
        </button>
    </div>

</form>

