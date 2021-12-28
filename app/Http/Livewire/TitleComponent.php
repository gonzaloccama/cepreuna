<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TitleComponent extends Component
{
    protected $listeners = ['title' => 'updateTitle'];
    public $title = 'Inicio';

    public function mount()
    {
        if (isset($_GET['page']) && !empty($_GET['page'])){
            $this->title = ucwords($_GET['page']);
        }
    }

    public function render()
    {
        return view('livewire.title-component');
    }

    public function updateTitle($title)
    {
        $this->title = ucwords($title['title']);
    }
}
