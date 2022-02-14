<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginComponent extends Component
{
    public $email;
    public $password;
    public $currentPath;

    public $tab;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $attributes = [
        'email' => '<b><ins>Email</ins></b>',
        'password' => '<b><ins>Contraseña</ins></b>',
    ];

    public function mount()
    {
        if (Auth::user()) {
            $this->redirect(route('social.home'));
        }

        $this->currentPath = request()->path();

        $this->tab = 1;
    }

    public function render()
    {
        $data['is_auth'] = true;
        $_data['_title'] = 'Login';
        return view('livewire.auth.login-component', $_data)->layout('layouts.social', $data);
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function login(Request $request)
    {
        $this->validate($this->rules, [], $this->attributes);

        if ($this->attemptLogin()) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo());
        }
        session()->flash('error', 'Estas credenciales no coinciden con nuestros registros.');
        return;
    }

    protected function attemptLogin()
    {
        return $this->guard()->attempt(
            ['email' => $this->email, 'password' => $this->password],
        );
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function redirectTo()
    {
        if (Auth::user()->role == 1) {
            return '/admin/users';  // admin dashboard path
        } else {
            return '/';  // member dashboard path
        }
    }

    public function updateTab($tab)
    {
        $this->tab = $tab;
    }
}
