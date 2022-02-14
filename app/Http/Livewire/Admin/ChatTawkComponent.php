<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ChatTawkComponent extends BaseComponent
{
    public function render()
    {
        $data['_title'] = 'Adminstrar Messenger';

        $this->emit('refreshComponent');

        return view('livewire.admin.chat-tawk-component', $data)->layout('layouts.backend');
    }
}
