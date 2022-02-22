<?php

namespace App\Http\Livewire\Admin;

use App\Models\Faq;
use App\Models\FaqSection;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class FaqComponent extends BaseComponent
{
    use WithPagination;

    public $faq_question;
    public $faq_answers;
    public $faq_section_faq;
    public $faq_views;
    public $status;

    public $created_at;

    public $inInputs;
    public $itIn;

    public $headers = [
        'faq_question' => 'Pregunta',
        'faq_section' => 'Sección',
        'faq_views' => 'Vistas',
        'status' => 'Est.',

        'not' => '',
    ];

    protected $attributes = [
        'faq_question' => '<b><ins>Pregunta</ins></b>',
        'faq_section_faq' => '<b><ins>Sección</ins></b>',
        'faq_answers.0' => '<b><ins>Respuesta</ins></b>',
        'faq_answers.*' => '<b><ins>Respuesta</ins></b>',
        'faq_views' => '<b><ins>Vistas</ins></b>',
        'status' => '<b><ins>Estado</ins></b>',
    ];

    protected $rules = [
        'faq_question' => 'required|max:220',
        'faq_section_faq' => 'required',
        'faq_answers.0' => 'required|max:720',
        'faq_answers.*' => 'nullable|max:720',
        'faq_views' => 'nullable',
        'status' => 'nullable',
    ];

    public function mount()
    {
        $this->fieldSort = 'faqs.created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->status = 1;

        $this->inInputs = [];
        $this->itIn = 0;
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), array('not', 'faq_section'));
        $findIn = [];
        $table = 'faqs';

        foreach ($_pre as $item) {
            $findIn[] = $table . '.' . $item;
        }
        $findIn[] = 'faq_sections.faq_section';

        $data['results'] = Faq::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->select('faqs.*')
            ->selectRaw('faq_sections.faq_section')
            ->join('faq_sections', 'faq_sections.id', '=', $table . '.faq_section_faq')
            ->paginate($this->limit);

        $data['_title'] = 'FAQs';

        $this->emit('refreshComponent');

        return view('livewire.admin.faq-component', $data)->layout('layouts.backend');
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

        $data = new Faq();

        $data->faq_question = $this->faq_question;
        $data->faq_answers = json_encode(array_values($this->faq_answers));;
        $data->faq_section_faq = $this->faq_section_faq;
        $data->faq_views = 0;
        $data->status = $this->status ? '1' : '0';

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = Faq::where('id', $this->itemId)->first();

        $this->faq_question = $data->faq_question;
        $this->faq_answers = json_decode($data->faq_answers);
        $this->faq_section_faq = !$view ? $data->faq_section_faq : $data->section->faq_section ;
        $this->faq_views = $data->faq_views;
        $this->status = (int)$data->status;

        $this->created_at = $data->created_at;

        if (!$view) {
            if ($this->faq_answers) {
                $this->inInputs = array_diff(array_keys($this->faq_answers), [0]);
                $this->itIn = count($this->inInputs);
            }

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

            $data = Faq::find($this->itemId);

            $data->faq_question = $this->faq_question;
            $data->faq_answers = json_encode(array_values($this->faq_answers));
            $data->faq_section_faq = $this->faq_section_faq;

            $data->status = $this->status ? '1' : '0';

            if ($data->save()) {
                $this->emit('alertUpdate');
                $this->closeFrame();
            }
        }
    }

    public function addInput($iterator)
    {
        $iterator = $iterator + 1;
        $this->itIn = $iterator;
        $this->inInputs[] = $iterator;
    }

    public function removeInput($iterator, $item)
    {
        unset($this->inInputs[$iterator]);
        if ($this->faq_answers)
            unset($this->faq_answers[$item]);
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

        $this->faq_question = null;
        $this->faq_answers = null;
        $this->faq_section_faq = null;
        $this->faq_views = null;
        $this->status = 1;
        $this->created_at = null;

        $this->inInputs = [];
        $this->itIn = 0;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deleteRegister()
    {
        $data = Faq::find($this->deleteId);
        if ($data->delete()) {
            $this->frame = 'index';
            $this->cleanItems();
        }
    }
}
