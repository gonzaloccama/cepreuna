<?php

namespace App\Http\Livewire\Admin\Others;

use App\Http\Livewire\Admin\BaseComponent;
use App\Models\FaqSection;
use Livewire\Component;
use Livewire\WithPagination;

class FaqSectionComponent extends BaseComponent
{
    use WithPagination;

    public $faq_section;

    public $frame_inline;

    public $headers = [
        'id' => 'Nro',
        'faq_section' => 'Sección',

        'not' => '',
    ];

    protected $attributes = [
        'faq_section' => '<b><ins>Sección</ins></b>',
    ];

    protected $rules = [
        'faq_section' => 'required',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->frame_inline = 'add';
    }

    public function render()
    {

        $_pre = array_diff(array_keys($this->headers), array('not'));
        $findIn = [];
        $table = 'faq_sections';

        foreach ($_pre as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = FaqSection::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);

        $data['_title'] = 'Secciones de FAQs';

        $this->emit('refreshComponent');

        return view('livewire.admin.others.faq-section-component', $data)->layout('layouts.backend');
    }

    public function updatingKeyWord()
    {
        $this->resetPage();
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);

        $data = new FaqSection();

        $data->faq_section = $this->faq_section;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = FaqSection::where('id', $this->itemId)->first();

        $this->faq_section = $data->faq_section;

        if (!$view) {

            $this->frame_inline = 'edit';
            $this->emit('refreshSection');
        }
    }

    public function updateRegister()
    {
        if ($this->itemId) {

            $this->validate($this->rules, [], $this->attributes);

            $data = FaqSection::find($this->itemId);

            $data->faq_section = $this->faq_section;

            if ($data->save()) {
                $this->emit('alertUpdate');
                $this->closeFrame();
            }
        }
    }

    public function closeFrame()
    {
        $this->frame = 'index';
        $this->frame_inline = 'add';
        $this->cleanItems();
    }

    public function cleanItems()
    {
        $this->deleteId = null;
        $this->itemId = null;

        $this->faq_section = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deleteRegister()
    {
        $data = FaqSection::find($this->deleteId);
        if ($data->delete()) {
            $this->closeFrame();
        }
    }
}
