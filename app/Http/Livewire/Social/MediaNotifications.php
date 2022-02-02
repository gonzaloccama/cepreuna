<?php

namespace App\Http\Livewire\Social;

use App\Models\MediaMessage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MediaNotifications extends Component
{
    public $notifications;

    public function mountData()
    {
        $this->notifications = MediaMessage:: where('to_user', auth()->user()->id)
            ->where('is_read', 0)
            ->select('from_user')->distinct()->get();
    }

    public function render()
    {
        $this->mountData();

        return view('livewire.social.media-notifications');
    }
}
