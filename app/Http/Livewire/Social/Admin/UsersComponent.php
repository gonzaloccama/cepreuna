<?php

namespace App\Http\Livewire\Social\Admin;

use App\Http\Livewire\Admin\BaseComponent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Str;

class UsersComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $username;
    public $email;
    public $phone;
    public $password;
    public $role;
    public $user_started;
    public $user_activated;
    public $user_verified;
    public $user_banned;
    public $user_firstname;
    public $user_lastname;
    public $user_dni;
    public $user_gender;
    public $user_address;
    public $user_region;
    public $user_province;
    public $user_birthdate;
    public $user_relationship;
    public $user_biography;
    public $created_at;

    public $user_picture;
    public $new_user_picture;
    public $edit_user_picture;

    public $user_cover;
    public $new_user_cover;
    public $edit_user_cover;

    public $itemId;

    public $findURL;
    public $tab;

    public $headers = [
        'user_dni' => 'DNI',
        'fullname' => 'Nombres',
        'phone' => 'Celular',
        'email' => 'Email',
        'user_activated' => 'Est.',
        'created_at' => 'Unido',
        'not' => '',
    ];

    protected $attributes = [
        'username' => '<b><ins>Nombre de usuario</ins></b>',
        'email' => '<b><ins>Email</ins></b>',
        'phone' => '<b><ins>Celular</ins></b>',
        'role' => '<b><ins>Rol de usuario</ins></b>',
        'user_activated' => '<b><ins>Usuario activado</ins></b>',
        'user_verified' => '<b><ins>Usuario verificado</ins></b>',
        'user_banned' => '<b><ins>Usuario baneado</ins></b>',
        'user_firstname' => '<b><ins>Nombres</ins></b>',
        'user_lastname' => '<b><ins>Apellidos</ins></b>',
        'user_dni' => '<b><ins>DNI</ins></b>',
        'user_gender' => '<b><ins>Sexo</ins></b>',
        'user_address' => '<b><ins>Dirección</ins></b>',
        'user_region' => '<b><ins>Región</ins></b>',
        'user_province' => '<b><ins>Provincia</ins></b>',
        'user_birthdate' => '<b><ins>Cumpleaños</ins></b>',
        'user_relationship' => '<b><ins>Estado civil</ins></b>',
        'user_biography' => '<b><ins>Bigrafía</ins></b>',
        'user_cover' => '<b><ins>Avatar</ins></b>',
        'new_user_cover' => '<b><ins>Avatar</ins></b>',
    ];
    protected $rules = [
        'username' => 'required|min:3|unique:users',
        'email' => 'required|email|unique:users',
        'phone' => 'required|numeric|digits:9|unique:users',
        'role' => 'required',
        'user_started' => 'nullable',
        'user_activated' => 'nullable',
        'user_verified' => 'nullable',
        'user_banned' => 'nullable',
        'user_firstname' => 'required|min:3',
        'user_lastname' => 'required|min:3',
        'user_dni' => 'required|numeric|digits:8',
        'user_gender' => 'nullable',
        'user_address' => 'nullable',
        'user_region' => 'nullable',
        'user_province' => 'nullable',
        'user_birthdate' => 'nullable',
        'user_relationship' => 'nullable',
        'user_biography' => 'nullable',
        'user_cover' => 'nullable|mimes:jpeg,jpg,png|max:150',
        'new_user_cover' => 'nullable|mimes:jpeg,jpg,png|max:150',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->image_path = 'images/users/';
        $this->tab = 1;
        $this->user_activated = 1;
        $this->role = 4;
    }

    public function render()
    {
        $findIn = array_diff(array_keys($this->headers), array('not', 'created_at', 'fullname'));

        $data['results'] = User::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
                $query->orWhere(DB::raw("CONCAT(user_firstname, ' ', user_lastname)"), 'LIKE', '%' . $this->keyWord . '%');
            })
//            ->where('username', '!=', 'root')
            ->select('users.*')
            ->selectRaw('CONCAT(users.user_firstname," ",users.user_lastname) as fullname')
            ->paginate($this->limit);

        $data['_title'] = 'Usuarios';

        $this->emit('refreshComponent');

        return view('livewire.social.admin.users-component', $data)->layout('layouts.backend');
    }

    public function updatingKeyWord()
    {
        $this->resetPage();
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function openAdd()
    {
        $this->frame = 'add';
        $this->emit('refreshSection');
    }

    public function tab($tab)
    {
        $this->tab = $tab;
    }

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);

        if ($this->user_cover) {
            $imageName = Carbon::now()->timestamp . '.' . $this->user_cover->extension();
            $this->user_cover->storeAs($this->image_path, $imageName);
        }

        $data = new User();

        $data->username = $this->username;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->password = Hash::make($this->password = Str::random(8));
        $data->role = $this->role;
        $data->user_started = $this->user_started ? '1' : '0';
        $data->user_activated = $this->user_activated ? '1' : '0';
        $data->user_verified = $this->user_verified ? '1' : '0';
        $data->user_banned = $this->user_banned ? '1' : '0';
        $data->user_firstname = $this->user_firstname;
        $data->user_lastname = $this->user_lastname;
        $data->user_dni = $this->user_dni;
        $data->user_gender = $this->user_gender;
        $data->user_address = $this->user_address;
        $data->user_region = $this->user_region;
        $data->user_province = $this->user_province;
        $data->user_birthdate = $this->user_birthdate;
        $data->user_relationship = $this->user_relationship;
        $data->user_biography = $this->user_biography;
        $data->user_cover = $this->user_cover ? $imageName : null;

        $this->findURL = $this->password;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = User::where('id', $this->itemId)->first();

        $this->username = $data->username;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->role = !$view ? $data->role : $data->user_role->role;
        $this->user_started = $data->user_started;
        $this->user_activated = (int)$data->user_activated;
        $this->user_verified = (int)$data->user_verified;
        $this->user_banned = (int)$data->user_banned;
        $this->user_firstname = $data->user_firstname;
        $this->user_lastname = $data->user_lastname;
        $this->user_dni = $data->user_dni;
        $this->user_gender = $data->user_gender;
        $this->user_address = $data->user_address;
        $this->user_region = $data->user_region;
        $this->user_province = $data->user_province;
        $this->user_birthdate = $data->user_birthdate;
        $this->user_relationship = $data->user_relationship;
        $this->user_biography = $data->user_biography;
        $this->edit_user_cover = $data->user_cover;
        $this->created_at = $data->created_at;
        $this->itemId = $data->id;

//        $this->findURL = $data->password;

        if (!$view) {
            $this->frame = 'edit';
            $this->emit('refreshSection');
        } else {
            $this->frame = 'view';
        }
    }

    public function updateRegister()
    {
        if ($this->itemId) {

            $rules = $this->rules;
            unset($rules['username'], $rules['email'], $rules['phone']);
            $rules = array_merge($rules, [
                'username' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits:9',
            ]);

            $this->validate($rules, [], $this->attributes);

            if ($this->new_user_cover) {
                $imageName = Carbon::now()->timestamp . '.' . $this->new_user_cover->extension();
                $this->new_user_cover->storeAs($this->image_path, $imageName);
            }

//            dd($rules);

            $data = User::find($this->itemId);

            $data->username = $this->username;
            $data->email = $this->email;
            $data->phone = $this->phone;
            $data->role = $this->role;
            $data->user_started = $this->user_started ? '1' : '0';
            $data->user_activated = $this->user_activated ? '1' : '0';
            $data->user_verified = $this->user_verified ? '1' : '0';
            $data->user_banned = $this->user_banned ? '1' : '0';
            $data->user_firstname = $this->user_firstname;
            $data->user_lastname = $this->user_lastname;
            $data->user_dni = $this->user_dni;
            $data->user_gender = $this->user_gender;
            $data->user_address = $this->user_address;
            $data->user_region = $this->user_region;
            $data->user_province = $this->user_province;
            $data->user_birthdate = $this->user_birthdate;
            $data->user_relationship = $this->user_relationship;
            $data->user_biography = $this->user_biography;
            $data->user_cover = $this->new_user_cover ? $imageName : $this->edit_user_cover;


            if ($data->save()) {
                if ($this->edit_user_cover && $this->new_user_cover) {
                    File::delete(
                        public_path('assets/' . $this->image_path . $this->edit_user_cover)
                    );
                }
                $this->emit('alertUpdate');
                $this->closeFrame();
            }
        }
    }

    public function deleteRegister()
    {
        $data = User::find($this->deleteId);
        $pathImage = $data->user_cover;
        if ($data->delete()) {
            if ($pathImage) {
                File::delete(
                    public_path('assets/' . $this->image_path . $pathImage)
                );
            }
            $this->frame = 'index';
            $this->cleanItems();
        }
    }

    public function closeFrame()
    {
        $this->frame = 'index';
        $this->cleanItems();
    }

    public function cleanItems()
    {
        $this->deleteId = null;
        $this->itemId = null;

        $this->username = null;
        $this->email = null;
        $this->phone = null;
        $this->role = 4;
        $this->user_started = null;
        $this->user_activated = 1;
        $this->user_verified = null;
        $this->user_banned = null;
        $this->user_firstname = null;
        $this->user_lastname = null;
        $this->user_dni = null;
        $this->user_gender = null;
        $this->user_address = null;
        $this->user_region = null;
        $this->user_province = null;
        $this->user_birthdate = null;
        $this->user_relationship = null;
        $this->user_biography = null;
        $this->user_cover = null;
        $this->new_user_cover = null;
        $this->edit_user_cover = null;

        $this->tab = 1;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
