<?php

namespace App\Http\Livewire;

use App\Models\ContactForm;
use App\Models\Document;
use App\Models\Faq;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class HomeComponent extends Component
{
    protected $listeners = ['menu' => 'updateMenu', 'refreshComponent' => '$refresh'];

    public $page = 'inicio';

    public $viewDetailID;
    public $details;
    public $nameDetail;

    public $names;
    public $phone;
    public $email;
    public $subject;
    public $message;

    public $is_read = [];

    protected $rules = [
        'names' => 'required|min:3',
        'phone' => 'required|numeric|digits:9',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'nullable|min:50|max:360',
    ];

    protected $attributes = [
        'names' => '<b><ins>Nombres y Apellidos</ins></b>',
        'phone' => '<b><ins>Celular</ins></b>',
        'email' => '<b><ins>Correo Electrónico</ins></b>',
        'subject' => '<b><ins>Asunto</ins></b>',
        'message' => '<b><ins>Mensaje</ins></b>',
    ];

    public $cycleLoadMore;
    public $statementLoadMore;
    public $employmentLoadMore;
    public $documentLoadMore;
    public $postLoadMore;

    protected $queryString = [
        'page' => ['except' => ''],
        'viewDetailID' => ['except' => null],
        'details' => ['except' => null],
    ];

    public $title = 'Inicio';

    public function mount()
    {
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $this->title = $this->page;
        }

        $this->cleanItems();
    }

    public function render()
    {
        $data = [];

        $this->emit('refreshContent');

        return view('livewire.home-component', $data)->layout('layouts.frontend');
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function saveContact()
    {
        $this->validate($this->rules, [], $this->attributes);

        $data = new ContactForm();

        $data->names = $this->names;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->subject = $this->subject;
        $data->message = $this->message;

        if ($data->save()) {
            session()->flash('message', 'Su mensaje se envió exitosamente!.');
            $this->cleanItems();
        }

    }

    public function updateMenu($page, $title = null)
    {
        $this->emit('loadingPage');

        if (!$title) {
            $this->page = $page['menu'];
            $this->title = $page['title'];
        } else {
            $this->emitTo('title-component', 'title', ['title' => $title]);
            $this->page = $page;
            $this->title = $title;
        }

        $this->cleanItems();

        $this->cleanDetails();
    }

    public function cycleLoadMore()
    {
        $this->cycleLoadMore += 3;
    }

    public function statementLoadMore()
    {
        $this->statementLoadMore += 5;
    }

    public function employmentLoadMore()
    {
        $this->employmentLoadMore += 5;
    }

    public function documentLoadMore()
    {
        $this->documentLoadMore += 5;
    }

    public function postLoadMore()
    {
        $this->postLoadMore += 3;
    }

    public function details($id, $details, $page = null)
    {
        $this->emit('loadingPage');

        $this->viewDetailID = $id;
        $this->details = 'detail-' . $details;

        if ($page) {
            $this->page = $page;
        }
    }

    public function addReadFAQ($id = null)
    {
        try {
            if (!in_array($id, $this->is_read)) {
                $this->is_read[] = $id;

                $data = Faq::find($id);
                $data->faq_views = $data->faq_views + 1;
                $data->save();

            }
        } catch (\Exception $e) {
        }
    }

    public function cleanDetails()
    {
        $this->viewDetailID = null;
        $this->details = null;
        $this->nameDetail = null;
    }

    public function cleanItems()
    {
        $this->cycleLoadMore = 6;
        $this->statementLoadMore = 6;
        $this->employmentLoadMore = 6;
        $this->documentLoadMore = 6;
        $this->postLoadMore = 6;

        $this->names = null;
        $this->phone = null;
        $this->email = null;
        $this->subject = null;
        $this->message = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function dateSpanish($date, $part = 'full')
    {
        $year = date('Y', strtotime($date));
        $month = date('n', strtotime($date));
        $day = date('d', strtotime($date));
        $week = date('w', strtotime($date));
        $daysWeek = [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado"
        ];
        $months = [
            1 =>
                "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"

        ];

        switch ($part) {
            case 'full':
                return $daysWeek[$week] . ", $day de " . $months[$month] . " de $year";
            case 'year':
                return $year;
            case 'month':
                return $months[$month];
            case 'day':
                return $day;
            case 'without':
                return "$day de " . $months[$month] . " de $year";
            default:
                return $daysWeek[$week];
        }
    }

}
