<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuFooterComponent extends Component
{
    public $_menu;

    public function render()
    {
        return view('livewire.menu-footer-component');
    }

    public function updateMenu($page, $title)
    {
        $this->_menu = $page;
        $this->emitTo('home-component', 'menu', ['menu' => $this->_menu, 'title' => $title]);
        $this->emitTo('title-component', 'title', ['title' => $title]);
    }
}
