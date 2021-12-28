<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuResponsiveComponent extends Component
{
    public $menu;

    public function mount()
    {
        $this->menu = 'inicio';
    }

    public function render()
    {
        return view('livewire.menu-responsive-component');
    }

    public function updateMenu($page, $title)
    {
        $this->menu = $page;
        $this->emitTo('home-component', 'menu', ['menu' => $this->menu, 'title' => $title]);
        $this->emitTo('title-component', 'title', ['title' => $title]);
    }
}
