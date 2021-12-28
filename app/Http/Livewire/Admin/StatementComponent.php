<?php

namespace App\Http\Livewire\Admin;

use App\Models\Statement;
use Livewire\Component;
use Livewire\WithPagination;

class StatementComponent extends BaseComponent
{
    use WithPagination;

    public $title;
    public $file;
    public $is_url;
    public $url;
    public $category_statement;
    public $description;
    public $created_at;

    public $findURL;

    public $headers = [
        'title' => 'Nombre del comunicado',
        'url' => 'URL',
        'category' => 'Categoria',
        'created_at' => 'Fecha',
        'not' => '',
    ];

    protected $attributes = [
        'title' => '<b><ins>nombre del documento</ins></b>',
        'file' => '<b><ins>PDF</ins></b>',
        'description' => '<b><ins>descripción</ins></b>',
        'is_url' => '<b><ins>es URL?</ins></b>',
        'url' => '<b><ins>URL</ins></b>',
        'category_statement' => '<b><ins>categoria</ins></b>',
    ];

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:6|max:480',
        'url' => 'required|url',
        'category_statement' => 'required',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';
    }

    public function render()
    {
        $findIn = array_diff(array_keys($this->headers), array('not', 'created_at'));

        $data['results'] = Statement::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->join('category_statements', 'category_statements.id', '=', 'category_statement')
            ->select('statements.*')
            ->selectRaw('category_statements.category')
            ->paginate($this->limit);
        $data['_title'] = 'Comunicados';

        $this->emit('refreshComponent');

        return view('livewire.admin.statement-component', $data)->layout('layouts.backend');
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


        $data = new Statement();

        $data->title = $this->title;
        $data->file = null;
        $data->is_url = '1';
        $data->url = $this->url;
        $data->category_statement = $this->category_statement;
        $data->description = $this->description;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {

        $this->itemId = $id;
        $data = Statement::where('id', $this->itemId)->first();

        $this->title = $data->title;
        $this->file = $data->file;
        $this->is_url = $data->is_url;
        $this->url = $data->url;
        $this->category_statement = !$view ? $data->category_statement : $data->category->category;
        $this->description = $data->description;
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

            $this->validate($this->rules, [], $this->attributes);

            $data = Statement::find($this->itemId);

            $data->title = $this->title;
            $data->file = null;
            $data->is_url = $this->is_url;
            $data->url = $this->url;
            $data->category_statement = $this->category_statement;
            $data->description = $this->description;

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
        $this->file = null;
        $this->is_url = null;
        $this->url = null;
        $this->category_statement = null;
        $this->description = null;
        $this->created_at = null;

        $this->findURL = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deleteRegister()
    {
        $data = Statement::find($this->deleteId);
//        $pathFile = $data->file;
        if ($data->delete()) {
            $this->frame = 'index';
            $this->cleanItems();
        }
    }
}
