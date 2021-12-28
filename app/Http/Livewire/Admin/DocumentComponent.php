<?php

namespace App\Http\Livewire\Admin;

use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentComponent extends BaseComponent
{
    use WithPagination;

    public $name_document;
    public $file;
    public $description;
    public $is_url;
    public $url;
    public $category_document;
    public $created_at;

    public $findURL;

    public $headers = [
        'name_document' => 'Documento',
        'url' => 'URL',
        'category' => 'Categoria',
        'created_at' => 'Fecha',
        'not' => '',
    ];

    protected $attributes = [
        'name_document' => '<b><ins>nombre del documento</ins></b>',
        'file' => '<b><ins>PDF</ins></b>',
        'description' => '<b><ins>descripción</ins></b>',
        'is_url' => '<b><ins>es URL?</ins></b>',
        'url' => '<b><ins>URL</ins></b>',
        'category_document' => '<b><ins>categoria</ins></b>',
    ];

    protected $rules = [
        'name_document' => 'required|min:3',

        'description' => 'required|min:6|max:480',

        'url' => 'required|url',
        'category_document' => 'required',
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

        $data['results'] = Document::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->join('category_documents', 'category_documents.id', '=', 'category_document')
            ->select('documents.*')
            ->selectRaw('category_documents.category')
            ->paginate($this->limit);
        $data['_title'] = 'Documentos';

        $this->emit('refreshComponent');

        return view('livewire.admin.document-component', $data)->layout('layouts.backend');
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


        $data = new Document();

        $data->name_document = $this->name_document;
        $data->file = null;
        $data->description = $this->description;
        $data->is_url = "1";
        $data->url = $this->url;
        $data->category_document = $this->category_document;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {

        $this->itemId = $id;
        $data = Document::where('id', $this->itemId)->first();

        $this->name_document = $data->name_document;
        $this->file = $data->file;
        $this->description = $data->description;
        $this->is_url = $data->is_url;
        $this->url = $data->url;
        $this->category_document = !$view ? $data->category_document : $data->category->category;
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

            $data = Document::find($this->itemId);

            $data->name_document = $this->name_document;
            $data->file = null;
            $data->description = $this->description;
            $data->is_url = $this->is_url;
            $data->url = $this->url;
            $data->category_document = $this->category_document;

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

        $this->name_document = null;
        $this->file = null;
        $this->description = null;
        $this->is_url = null;
        $this->url = null;
        $this->category_document = null;
        $this->findURL = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deleteRegister()
    {
        $data = Document::find($this->deleteId);
//        $pathFile = $data->file;
        if ($data->delete()) {
            $this->frame = 'index';
            $this->cleanItems();
        }
    }
}
