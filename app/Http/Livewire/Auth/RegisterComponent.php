<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use GuzzleHttp\Client;
use Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $username;
    public $email;
    public $phone;
    public $password;
    public $confirm_password;
    public $user_firstname;
    public $user_lastname;
    public $user_dni;

    public $readonly;

    protected $rules = [
        'username' => 'required|min:6|unique:users',
        'email' => 'required|email|unique:users',
        'phone' => 'required|numeric|digits:9|unique:users',
        'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$@#%]).*$/|',
        'confirm_password' => 'required|required|same:password',
        'user_firstname' => 'required|min:3',
        'user_lastname' => 'required|min:3',
        'user_dni' => 'required|numeric|digits:8',
    ];

    protected $attributes = [
        'username' => '<b><ins>Nombre de usuario</ins></b>',
        'email' => '<b><ins>Email</ins></b>',
        'phone' => '<b><ins>Celular</ins></b>',
        'password' => '<b><ins>Contraseña</ins></b>',
        'confirm_password' => '<b><ins>Confirmar contraseña</ins></b>',
        'user_firstname' => '<b><ins>Nombres</ins></b>',
        'user_lastname' => '<b><ins>Apellidos</ins></b>',
        'user_dni' => '<b><ins>DNI</ins></b>',
    ];

    public function mount()
    {
        if (Auth::user()) {
            $this->redirect(route('social.home'));
        }

        $this->readonly = false;
    }

    public function render()
    {
        $data['is_auth'] = true;
        $_data['_title'] = 'Registrar';
        return view('livewire.auth.register-component', $_data)->layout('layouts.social', $data);
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function register()
    {
        $this->validate($this->rules, [], $this->attributes);

        $register = new User();

        $register->username = $this->username;
        $register->email = $this->email;
        $register->phone = $this->phone;
        $register->password = Hash::make($this->password);
        $register->user_firstname = $this->user_firstname;
        $register->user_lastname = $this->user_lastname;
        $register->user_dni = $this->user_dni;
        $register->role = 4;

        if ($register->save()) {
            $this->cleanItems();
            return redirect('/');
        }

        session()->flash('error', '¡Algo salio mal!.');
        return;
    }

    protected function redirectTo()
    {
        if (Auth::user()->role == 1) {
            return '/admin/users';  // admin dashboard path
        } else {
            return '/';  // member dashboard path
        }
    }

    public function cleanItems()
    {
        $this->username = null;
        $this->email = null;
        $this->phone = null;
        $this->password = null;
        $this->confirm_password = null;
        $this->user_firstname = null;
        $this->user_lastname = null;
        $this->user_dni = null;

        $this->readonly = false;
    }

    /*** begin search data ***/
    public function searchData()
    {
        $this->validate(['user_dni' => 'required|numeric|digits:8',], [], $this->attributes);
        $data = [];
        if ($this->user_dni) {
            $data = $this->getDNI($this->user_dni);
            if ($data && $data->Nombre != '' && $data->Paterno != '') {
                $this->user_firstname = mb_convert_case($data->Nombre, MB_CASE_TITLE, "UTF-8");
                $this->user_lastname = mb_convert_case($data->Paterno . ' ' . $data->Materno, MB_CASE_TITLE, "UTF-8");

                $this->readonly = true;
            }
        }
    }

    private function getDNI($id)
    {
        $client = new Client();
        $response = $client
            ->get('https://www.facturacionelectronica.us/' .
                'facturacion/controller/ws_consulta_rucdni_v2.php?documento=' .
                'DNI&usuario=10447915125&password=985511933&nro_documento=' . $id)
            ->getBody();
        return json_decode($response)->result;
    }
    /*** end search data ***/
}
