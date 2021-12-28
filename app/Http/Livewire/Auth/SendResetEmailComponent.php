<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class SendResetEmailComponent extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email|exists:users',
    ];

    protected $attributes = [
        'email' => '<b><ins>Email</ins></b>',
    ];

    public function render()
    {
        $data['is_auth'] = true;
        $_data['_title'] = 'Enviar Email';
        return view('livewire.auth.send-reset-email-component', $_data)->layout('layouts.social', $data);
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function send_reset_email()
    {
        $this->validate($this->rules, [], $this->attributes);
    }
}
