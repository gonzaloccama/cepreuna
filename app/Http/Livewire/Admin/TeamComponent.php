<?php

namespace App\Http\Livewire\Admin;

use App\Models\TeamMember;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TeamComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $names;
    public $email;
    public $facebook;
    public $twitter;
    public $whatsapp;
    public $biography;
    public $status;
    public $created_at;

    public $image;
    public $newImage;
    public $editImage;

    public $findURL;

    public $headers = [
        'image' => 'Img.',
        'title' => 'Título',
        'names' => 'Nombres',
        'email' => 'Email',
        'status' => 'Estado',
        'not' => '',
    ];

    protected $attributes = [
        'title' => '<b><ins>Titulo</ins></b>',
        'names' => '<b><ins>Nombres</ins></b>',
        'email' => '<b><ins>Email</ins></b>',
        'facebook' => '<b><ins>Facebook</ins></b>',
        'twitter' => '<b><ins>Twitter</ins></b>',
        'whatsapp' => '<b><ins>WhatsApp</ins></b>',
        'biography' => '<b><ins>Biografía</ins></b>',

        'image' => '<b><ins>Imagen</ins></b>',
        'newImage' => '<b><ins>Imagen</ins></b>',
    ];

    protected $rules = [
        'title' => 'required|min:3',
        'names' => 'required|min:3',
        'email' => 'required|email|unique:team_members',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'whatsapp' => 'nullable|numeric|digits:9',
        'biography' => 'nullable|min:50',
        'image' => 'required|mimes:jpeg,jpg,png|max:240',
        'newImage' => 'nullable|mimes:jpeg,jpg,png|max:240',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'asc';
        $this->iconSort = 'la la-arrow-up';

        $this->image_path = 'images/team/';
        $this->status = 1;
    }

    public function render()
    {
        $findIn = array_diff(array_keys($this->headers), array('not'));

        $data['results'] = TeamMember::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);
        $data['_title'] = 'Directivos';

        $this->emit('refreshComponent');

        return view('livewire.admin.team-component', $data)->layout('layouts.backend');
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

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs($this->image_path, $imageName);

        $data = new TeamMember();

        $data->title = $this->title;
        $data->names = $this->names;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->twitter = $this->twitter;
        $data->whatsapp = $this->whatsapp;
        $data->biography = $this->biography;
        $data->status = $this->status ? '1' : '0';

        $data->image = $imageName;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = TeamMember::where('id', $this->itemId)->first();

        $this->title = $data->title;
        $this->names = $data->names;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->twitter = $data->twitter;
        $this->whatsapp = $data->whatsapp;
        $this->biography = $data->biography;
        $this->status = (int)$data->status;

        $this->editImage = $data->image;
        $this->created_at = $data->created_at;

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
            unset($rules['image'], $rules['email']);
            $rules = array_merge($rules, ['email' => 'required|email']);

            $this->validate($rules, [], $this->attributes);

            if ($this->newImage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
                $this->newImage->storeAs($this->image_path, $imageName);
            }

            $data = TeamMember::find($this->itemId);

            $data->title = $this->title;
            $data->names = $this->names;
            $data->email = $this->email;
            $data->facebook = $this->facebook;
            $data->twitter = $this->twitter;
            $data->whatsapp = $this->whatsapp;
            $data->biography = $this->biography;
            $data->status = $this->status ? "1" : "0";
            $data->image = $this->newImage ? $imageName : $this->editImage;

            if ($data->save()) {
                if ($this->editImage && $this->newImage) {
                    File::delete(
                        public_path('assets/' . $this->image_path . $this->editImage)
                    );
                }
                $this->emit('alertUpdate');
                $this->closeFrame();
            }
        }
    }

    public function deleteRegister()
    {
        $data = TeamMember::find($this->deleteId);
        $pathImage = $data->image;
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

        $this->title = null;
        $this->names = null;
        $this->email = null;
        $this->facebook = null;
        $this->twitter = null;
        $this->whatsapp = null;
        $this->biography = null;
        $this->status = 1;

        $this->image = null;
        $this->newImage = null;
        $this->editImage = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
