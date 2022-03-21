<?php

namespace App\Http\Livewire\Admin;

use App\Models\CycleAcademy;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CycleComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $cicle;
    public $start_register;
    public $finish_register;
    public $start_class;
    public $finish_class;
    public $requires;
    public $go_link;
    public $price;
    public $horary;
    public $status;

    public $image;
    public $newImage;
    public $editImage;

    public $headers = [
        'cicle' => 'Ciclo',
        'start_register' => 'Inicio de inscripciones',
        'finish_register' => 'culminación de inscripciones',
        'status' => 'Estado',
        'not' => '',
    ];

    protected $attributes = [
        'cicle' => '<b><ins>nombre del ciclo</ins></b>',
        'start_register' => '<b><ins>inicio de inscripciones</ins></b>',
        'finish_register' => '<b><ins>culminación de inscripciones</ins></b>',
        'start_class' => '<b><ins>inicio de clases</ins></b>',
        'finish_class' => '<b><ins>culminación de clases</ins></b>',
        'go_link' => '<b><ins>url de inscripción</ins></b>',
        'image' => '<b><ins>poster del ciclo</ins></b>',
        'newImage' => '<b><ins>poster del ciclo</ins></b>',
    ];

    protected $rules = [
        'cicle' => 'required|min:3',
        'start_register' => 'required|date_format:Y-m-d H:i',
        'finish_register' => 'required|date_format:Y-m-d H:i',
        'start_class' => 'required|date_format:Y-m-d',
        'finish_class' => 'required|date_format:Y-m-d',
        'go_link' => 'required|url',
        'image' => 'required|mimes:jpeg,jpg,png|max:520',
        'newImage' => 'nullable|mimes:jpeg,jpg,png|max:520'
    ];

    public function mount()
    {
        $this->fieldSort = 'cicle';

        $this->status = 1;
        $this->image_path = 'images/project/medium-size/';
        $this->go_link = 'https://sistemas.cepreuna.edu.pe/inscripciones/estudiantes';
    }

    public function render()
    {
        $findIn = array_diff(array_keys($this->headers), array('not'));

        $data['results'] = CycleAcademy::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })->paginate($this->limit);
        $data['_title'] = 'Ciclos';

        $this->emit('refreshComponent');

        return view('livewire.admin.cycle-component', $data)->layout('layouts.backend');
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
        $this->emit('refreshPicker');
    }

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs($this->image_path, $imageName);

        $data = new CycleAcademy();

        $data->cicle = $this->cicle;
        $data->start_register = $this->start_register;
        $data->finish_register = $this->finish_register;
        $data->start_class = $this->start_class;
        $data->finish_class = $this->finish_class;
        $data->go_link = $this->go_link;
        $data->status = $this->status ? "1" : "0";
        $data->image = $imageName;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {

        $this->itemId = $id;
        $data = CycleAcademy::where('id', $this->itemId)->first();

        $this->cicle = $data->cicle;
        $this->start_register = Carbon::parse($data->start_register)->format('Y-m-d H:i');
        $this->finish_register = Carbon::parse($data->finish_register)->format('Y-m-d H:i');
        $this->start_class = $data->start_class;
        $this->finish_class = $data->finish_class;
        $this->go_link = $data->go_link;
        $this->status = (int)$data->status;
        $this->editImage = $data->image;

        if (!$view) {
            $this->frame = 'edit';
            $this->emit('refreshPicker');
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

            $data = CycleAcademy::find($this->itemId);

            $data->cicle = $this->cicle;
            $data->start_register = $this->start_register;
            $data->finish_register = $this->finish_register;
            $data->start_class = $this->start_class;
            $data->finish_class = $this->finish_class;
            $data->go_link = $this->go_link;
            $data->image = $this->newImage ? $imageName : $this->editImage;
            $data->status = $this->status ? "1" : "0";

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
        $data = CycleAcademy::find($this->deleteId);
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

        $this->cicle = null;
        $this->start_register = null;
        $this->finish_register = null;
        $this->start_class = null;
        $this->finish_class = null;
        $this->requires = null;
        $this->go_link = 'https://sistemas.cepreuna.edu.pe/inscripciones/estudiantes';
        $this->image = null;
        $this->newImage = null;
        $this->editImage = null;
        $this->price = null;
        $this->horary = null;
        $this->status = 1;

        Cache::flush();

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
