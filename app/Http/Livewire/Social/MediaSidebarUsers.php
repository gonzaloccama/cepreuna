<?php

namespace App\Http\Livewire\Social;

use App\Models\User;
use Livewire\Component;

class MediaSidebarUsers extends Component
{
    public $users;

    public function mountData()
    {
        $this->users = User::orderBy('user_is_online', 'desc')->orderBy('user_last_activity', 'desc')->take(10)->get();
    }

    public function render()
    {
        $this->users = User::orderBy('user_is_online', 'desc')->orderBy('user_last_activity', 'desc')->take(10)->get();

        return view('livewire.social.media-sidebar-users');
    }
}
