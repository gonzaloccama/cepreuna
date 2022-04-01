<?php

namespace App\Http\Livewire\Admin;

use App\Models\PrivacyPolicy;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class PolitiesComponent extends BaseComponent
{
    use WithPagination;

    public $title;
    public $privacy_policy;
    public $order;
    public $group;
    public $status;

    public $created_at;

    public $headers = [
        'title' => 'Titulos',
        'group' => 'Grupo',
        'order' => 'Orden',
        'status' => 'Estado',

        'not' => '',
    ];

    protected $attributes = [
        'title' => '<b><ins>Titulo</ins></b>',
        'privacy_policy' => '<b><ins>Política de privacidad</ins></b>',
        'order' => '<b><ins>Orden</ins></b>',
        'group' => '<b><ins>Grupo</ins></b>',
        'status' => '<b><ins>Estado</ins></b>',
    ];

    protected $rules = [
        'title' => 'required|max:220',
        'privacy_policy' => 'required',
        'order' => 'nullable',
        'group' => 'nullable',
        'status' => 'required',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->status = 1;
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), ['not']);
        $findIn = [];
        $table = 'privacy_policies';

        foreach ($_pre as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = PrivacyPolicy::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);

        $data['_title'] = 'Políticas de privacidas';

        $this->emit('refreshComponent');

        return view('livewire.admin.polities-component', $data)->layout('layouts.backend');
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

        $data = new PrivacyPolicy();

        $data->title = $this->title;
        $data->privacy_policy = $this->privacy_policy;
        $data->order = $this->order;
        $data->group = $this->group;
        $data->status = $this->status;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = PrivacyPolicy::where('id', $this->itemId)->first();

        $this->title = $data->title;
        $this->privacy_policy = $data->privacy_policy;
        $this->order = $data->order;
        $this->group = !$view ? $data->group : $data->parent->title;
        $this->status = $data->status;

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

            $this->validate($this->rules, [], $this->attributes);

            $data = PrivacyPolicy::find($this->itemId);

            $data->title = $this->title;
            $data->privacy_policy = $this->privacy_policy;
            $data->order = $this->order;
            $data->group = $this->group;
            $data->status = $this->status;

            if ($data->save()) {
                $this->emit('alertUpdate');
                $this->closeFrame();
            }
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
        $this->privacy_policy = null;
        $this->order = null;
        $this->group = null;

        $this->status = 1;
        $this->created_at = null;

        Cache::flush();

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deleteRegister()
    {
        $data = PrivacyPolicy::find($this->deleteId);
        if ($data->delete()) {
            $this->frame = 'index';
            $this->cleanItems();
        }
    }
}
