<?php

namespace App\Http\Livewire\Social;

use Livewire\Component;

class MediaHeaderSearchComponent extends Component
{
    public $keySearch;

    public function mount()
    {
        $this->keySearch = '';
    }

    public function render()
    {
        return view('livewire.social.media-header-search-component');
    }

    public function updatedKeySearch()
    {
        $this->emitTo('social.media-posts-component', 'updateKeySearch', ['keyWord' => $this->keySearch]);
    }

    public function updateKeySearch()
    {
        $this->emitTo('social.media-posts-component', 'updateKeySearch', ['keyWord' => $this->keySearch]);
    }
}
