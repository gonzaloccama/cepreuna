<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EmploymentComponent extends BaseComponent
{
    use WithPagination;

    public $title;
    public $description;
    public $requires;
    public $is_url;
    public $url;
    public $file_employment;
    public $start_employments;
    public $end_employments;
    public $schedule;
    public $go_link;
    public $status;
    public $files;
    public $category_employment;
    public $created_at;

    public $findURL;

    public $inRequires, $inSchedule, $inFiles;
    public $itRe, $inSche, $inFi;

    public $headers = [
        'title' => 'Convocatoria',
        'start_employments' => 'Inicio',
        'end_employments' => 'Culminación',
        'category' => 'Categoria',
        'created_at' => 'Creación',
        'status' => 'Est.',
        'not' => '',
    ];

    protected $attributes = [
        'title' => '<b><ins>nombre del documento</ins></b>',
        'description' => '<b><ins>descripción</ins></b>',
        'requires' => '<b><ins>requisitos</ins></b>',
        'url' => '<b><ins>URL de la convocatoria</ins></b>',
        'start_employments' => '<b><ins>inicio de la convocatoria</ins></b>',
        'end_employments' => '<b><ins>dulminación de la convocatoria</ins></b>',
        'schedule' => '<b><ins>cronograma</ins></b>',
        'go_link' => '<b><ins>URL de inscripciones</ins></b>',
        'files' => '<b><ins>archivos</ins></b>',
        'category_employment' => '<b><ins>categoria</ins></b>',

        'requires.0' => '<b><ins>requisitos</ins></b>',
        'requires.*' => '<b><ins>requisitos</ins></b>',

        'schedule.0.detalle' => '<b><ins>cronograma</ins></b>',
        'schedule.0.fecha' => '<b><ins>cronograma</ins></b>',
        'schedule.*.detalle' => '<b><ins>cronograma</ins></b>',
        'schedule.*.fecha' => '<b><ins>cronograma</ins></b>',

        'files.0.descripcion' => '<b><ins>archivos</ins></b>',
        'files.0.file' => '<b><ins>archivos</ins></b>',
        'files.*.descripcion' => '<b><ins>archivos</ins></b>',
        'files.*.file' => '<b><ins>archivos</ins></b>',
    ];

    protected $rules = [
        'title' => 'required|min:6',
        'description' => 'required|min:9|max:360',
        'requires' => 'nullable',
        'is_url' => 'nullable',
        'url' => 'required|url',
        'file_employment' => 'nullable',
        'start_employments' => 'required|date_format:Y-m-d',
        'end_employments' => 'required|date_format:Y-m-d',
        'schedule' => 'nullable',
        'go_link' => 'required|url',
        'status' => 'nullable',
        'files' => 'nullable',
        'category_employment' => 'required',

        'requires.0' => 'required',
        'requires.*' => 'required',

        'schedule.0.detalle' => 'required',
        'schedule.0.fecha' => 'required',
        'schedule.*.detalle' => 'required',
        'schedule.*.fecha' => 'required',

        'files.0.descripcion' => 'required',
        'files.0.file' => 'required',
        'files.*.descripcion' => 'required',
        'files.*.file' => 'required',
    ];

    public function mount()
    {
        $this->fieldSort = 'end_employments';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->inRequires = $this->inSchedule = $this->inFiles = [];
        $this->itRe = $this->inSche = $this->inFi = 0;
    }

    public function render()
    {
        $findIn = array_diff(array_keys($this->headers), array('not', 'created_at'));

        $data['results'] = Employment::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->join('category_employments', 'category_employments.id', '=', 'category_employment')
            ->select('employments.*')
            ->selectRaw('category_employments.category')
            ->paginate($this->limit);
        $data['_title'] = 'Convocatorias';

        $this->emit('refreshComponent');
        return view('livewire.admin.employment-component', $data)->layout('layouts.backend');
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

//        dd(array_values($this->schedule));

        $data = new Employment();

        $data->title = $this->title;
        $data->description = $this->description;
        $data->requires = json_encode(array_values($this->requires));
        $data->is_url = '1';
        $data->url = $this->url;
        $data->file_employment = null;
        $data->start_employments = $this->start_employments;
        $data->end_employments = $this->end_employments;
        $data->schedule = json_encode(array_values($this->schedule));
        $data->go_link = $this->go_link;
        $data->status = $this->status ? '1' : '0';
        $data->files = json_encode(array_values($this->files));
        $data->category_employment = $this->category_employment;

        if ($data->save()) {
            $this->emit('alertAdd');
//            $this->moveTab(1);
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {

        $this->itemId = $id;
        $data = Employment::where('id', $this->itemId)->first();

        $this->title = $data->title;
        $this->description = $data->description;
        $this->requires = json_decode($data->requires);
        $this->is_url = $data->is_url;
        $this->url = $data->url;
        $this->file_employment = $data->file_employment;
        $this->start_employments = Carbon::parse($data->start_employments)->format('Y-m-d');
        $this->end_employments = Carbon::parse($data->end_employments)->format('Y-m-d');;
        $this->schedule = json_decode($data->schedule);
        $this->go_link = $data->go_link;
        $this->status = (int)$data->status;
        $this->files = json_decode($data->files);
        $this->category_employment = !$view ? $data->category_employment : $data->category->category;
        $this->created_at = $data->created_at;

        if (!$view) {
            if ($this->requires) {
                $this->inRequires = array_diff(array_keys($this->requires), [0]);
                $this->itRe = count($this->inRequires);
            }

            if ($this->schedule) {
                $this->inSchedule = array_diff(array_keys($this->schedule), [0]);
                $this->inSche = count($this->inSchedule);
            }

            if ($this->files) {
                $this->inFiles = array_diff(array_keys($this->files), [0]);
                $this->inFi = count($this->inFiles);
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

            $data = Employment::find($this->itemId);

            $data->title = $this->title;
            $data->description = $this->description;
            $data->requires = json_encode(array_values($this->requires));
            $data->is_url = $this->is_url;
            $data->url = $this->url;
            $data->file_employment = null;
            $data->start_employments = $this->start_employments;
            $data->end_employments = $this->end_employments;
            $data->schedule = json_encode(array_values($this->schedule));
            $data->go_link = $this->go_link;
            $data->status = $this->status ? '1' : '0';;
            $data->files = json_encode(array_values($this->files));
            $data->category_employment = $this->category_employment;

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
        $this->description = null;
        $this->requires = null;
        $this->is_url = null;
        $this->url = null;
        $this->file_employment = null;
        $this->start_employments = null;
        $this->end_employments = null;
        $this->schedule = null;
        $this->go_link = null;
        $this->status = null;
        $this->files = null;
        $this->category_employment = null;
        $this->created_at = null;

        $this->findURL = null;

        $this->inRequires = $this->inSchedule = $this->inFiles = [];
        $this->itRe = $this->inSche = $this->inFi = 0;

        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function deleteRegister()
    {
        $data = Employment::find($this->deleteId);
//        $pathFile = $data->file;
        if ($data->delete()) {
            $this->frame = 'index';
            $this->cleanItems();
        }
    }

    /*** / begin additional methods Employments  / ***/
    public function addRequires($iterator)
    {
        $iterator = $iterator + 1;
        $this->itRe = $iterator;
        $this->inRequires[] = $iterator;
    }

    public function removeRequires($iterator, $item)
    {
        unset($this->inRequires[$iterator]);
        if ($this->requires)
            unset($this->requires[$item]);
//        $this->itRe--;
    }

    public function addSchedule($iterator)
    {
        $iterator = $iterator + 1;
        $this->inSche = $iterator;
        $this->inSchedule[] = $iterator;
        $this->emit('refreshRangeFlatpickr');
    }

    public function removeSchedule($iterator, $item)
    {
        unset($this->inSchedule[$iterator]);
        if ($this->schedule)
            unset($this->schedule[$item]);
    }

    public function addFiles($iterator)
    {
        $iterator = $iterator + 1;
        $this->inFi = $iterator;
        $this->inFiles[] = $iterator;
    }

    public function removeFiles($iterator, $item)
    {
        unset($this->inFiles[$iterator]);
        if ($this->files)
            unset($this->files[$item]);
    }
    /*** / end additional methods Employments  / ***/
}
