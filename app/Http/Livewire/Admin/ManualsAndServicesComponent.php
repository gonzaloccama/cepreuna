<?php

namespace App\Http\Livewire\Admin;

use App\Models\ManualsAndServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManualsAndServicesComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $text;
    public $url;
    public $description;
    public $order;

    public $image;
    public $newImage;
    public $editImage;

    public $created_at;

    public $headers = [
        'image' => 'Imagen',
        'text' => 'Nombre',
        'url' => 'URL',
        'order' => 'Orden',

        'not' => '',
    ];

    protected $attributes = [
        'text' => '<b><ins>Nombre</ins></b>',
        'image' => '<b><ins>Imagen</ins></b>',
        'newImage' => '<b><ins>Imagen</ins></b>',
        'url' => '<b><ins>URL</ins></b>',
        'description' => '<b><ins>Descripción</ins></b>',
        'order' => '<b><ins>Orden</ins></b>',
    ];

    protected $rules = [
        'text' => 'required|max:21',
        'image' => 'required|mimes:jpeg,jpg,png|max:160',
        'newImage' => 'nullable|mimes:jpeg,jpg,png|max:160',
        'url' => 'required',
        'description' => 'nullable',
        'order' => 'nullable',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->image_path = 'images/service/medium-size/';
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), array('not'));
        $findIn = [];
        $table = 'manuals_and_services';

        foreach ($_pre as $item){
            $findIn[] = $table.'.'.$item;
        }

        $data['results'] = ManualsAndServices::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);
        $data['_title'] = 'Manuales y Servicios';

        $this->emit('refreshComponent');

        return view('livewire.admin.manuals-and-services-component', $data)->layout('layouts.backend');
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

        $data = new ManualsAndServices();

        $data->text = $this->text;
        $data->url = $this->url;
        $data->description = $this->description;
        $data->order = $this->order;

        $data->image = $imageName;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = ManualsAndServices::where('id', $this->itemId)->first();

        $this->text = $data->text;
        $this->url = $data->url;
        $this->description = $data->description;
        $this->order = $data->order;

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
            unset($rules['image']);

            $this->validate($rules, [], $this->attributes);

            if ($this->newImage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
                $this->newImage->storeAs($this->image_path, $imageName);
            }

            $data = ManualsAndServices::find($this->itemId);

            $data->text = $this->text;
            $data->url = $this->url;
            $data->description = $this->description;
            $data->order = $this->order;

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
        $data = ManualsAndServices::find($this->deleteId);
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

        $this->text = null;
        $this->url = null;
        $this->description = null;
        $this->order = null;

        $this->image = null;
        $this->newImage = null;
        $this->editImage = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
