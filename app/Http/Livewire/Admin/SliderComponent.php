<?php

namespace App\Http\Livewire\Admin;

use App\Models\systemSlider;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SliderComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $text;
    public $order;
    public $status;
    public $created_at;

    public $image;
    public $newImage;
    public $editImage;

    public $headers = [
        'image' => 'Img.',
        'title' => 'Título',
        'created_at' => 'Creación',
        'status' => 'Est.',
        'not' => '',
    ];

    protected $attributes = [
        'title' => '<b><ins>Titulo</ins></b>',
        'text' => '<b><ins>Texto</ins></b>',
        'order' => '<b><ins>Orden</ins></b>',
        'status' => '<b><ins>Estado</ins></b>',

        'image' => '<b><ins>Imagen</ins></b>',
        'newImage' => '<b><ins>Imagen</ins></b>',
    ];

    protected $rules = [
        'title' => 'required|min:3|max:44',
        'text' => 'required|min:3|max:130',
        'order' => 'nullable|numeric|min:1',
        'status' => 'nullable',

        'image' => 'required|mimes:jpeg,jpg,png|max:360',
        'newImage' => 'nullable|mimes:jpeg,jpg,png|max:360',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->image_path = 'images/slider/';
        $this->status = 1;
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), array('not'));
        $findIn = [];
        $table = 'system_sliders';

        foreach ($_pre as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = systemSlider::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);

        $data['_title'] = 'Sliders';

        $this->emit('refreshComponent');

        return view('livewire.admin.slider-component', $data)->layout('layouts.backend');
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

        $data = new systemSlider();

        $data->title = $this->title;
        $data->text = $this->text;
        $data->order = $this->order;
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
        $data = systemSlider::where('id', $this->itemId)->first();

        $this->title = $data->title;
        $this->text = $data->text;
        $this->order = $data->order;
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
            unset($rules['image']);
//            $rules = array_merge($rules, ['email' => 'required|email']);

            $this->validate($rules, [], $this->attributes);

            if ($this->newImage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
                $this->newImage->storeAs($this->image_path, $imageName);
            }

            $data = systemSlider::find($this->itemId);

            $data->title = $this->title;
            $data->text = $this->text;
            $data->order = $this->order;
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
        $data = systemSlider::find($this->deleteId);
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
        $this->text = null;
        $this->order = null;
        $this->status = 1;

        $this->image = null;
        $this->newImage = null;
        $this->editImage = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
