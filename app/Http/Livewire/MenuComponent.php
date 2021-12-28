<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class MenuComponent extends Component
{
    public $_menu;

    public function mount()
    {
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            if ($_GET['page'])
                $this->_menu = $_GET['page'];
        } else {
            $this->_menu = 'inicio';
        }
    }

    public function render()
    {
        return view('livewire.menu-component');
    }

    public function updateMenu($page, $title)
    {
        $this->_menu = $page;
        $this->emitTo('home-component', 'menu', ['menu' => $this->_menu, 'title' => $title]);
        $this->emitTo('title-component', 'title', ['title' => $title]);
    }

    public function parseMenu($data, $rt = null)
    {
        $result = [];

        foreach ($data as $item) :
            if ($item->parents == $rt):
                unset($data[$item->id]);
                $result = [
                    'name' => $item->id,
                    'route' => $item->route,
                    'is_route' => $item->is_route,
                    'page' => $item->page,
                    'parent' => $item->parent,
                    'children' => $this->parseUsers($data, $item->id)
                ];
            endif;
        endforeach;

        return empty($result) ? null : $result;
    }

    public function goUrl($route)
    {
        if ($route != 'logout') {
            $this->redirect(route($route));
        } else {
            Auth::logout();
        }
    }
}
