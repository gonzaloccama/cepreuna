<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessagesComponent extends BaseComponent
{
    use WithPagination;

    public $names;
    public $phone;
    public $email;
    public $subject;
    public $message;
    public $created_at;

    public $headers = [
        'names' => 'Nombres',
        'phone' => 'Celular',
        'email' => 'Email',
        'subject' => 'Asunto',

        'created_at' => 'Fecha',
        'not' => '',
    ];

    protected $attributes = [
        'names' => '<b><ins>Nombres</ins></b>',
        'phone' => '<b><ins>Celular</ins></b>',
        'email' => '<b><ins>Email</ins></b>',
        'subject' => '<b><ins>Asunto</ins></b>',
        'message' => '<b><ins>Mensajes</ins></b>',
    ];

    protected $rules = [
        'names' => 'nullable',
        'phone' => 'nullable',
        'email' => 'nullable',
        'subject' => 'nullable',
        'message' => 'nullable',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), array('not', 'created_at'));
        $findIn = [];
        $table = 'contact_forms';

        foreach ($_pre as $item){
            $findIn[] = $table.'.'.$item;
        }

        $data['results'] = ContactForm::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);
        $data['_title'] = 'Mensajes de Contacto';

        $this->emit('refreshComponent');

        return view('livewire.admin.contact-messages-component', $data)->layout('layouts.backend');
    }

    public function openEdit($id = 0, $view = false)
    {
        $this->itemId = $id;
        $data = ContactForm::where('id', $this->itemId)->first();

        $this->names = $data->names;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->subject = $data->subject;
        $this->message = $data->message;
        $this->created_at = $data->created_at;
        $this->itemId = $data->id;

//        $this->findURL = $data->password;

        if (!$view) {
            $this->frame = 'edit';
            $this->emit('refreshSection');
        } else {
            $this->frame = 'view';
        }
    }

    public function deleteRegister()
    {
        $data = ContactForm::find($this->deleteId);
        $data->delete();
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

        $this->names = null;
        $this->phone = null;
        $this->email = null;
        $this->subject = null;
        $this->message = null;
        $this->created_at = 1;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
