<?php

namespace App\Http\Livewire\Social\Admin;

use App\Http\Livewire\Admin\BaseComponent;
use App\Models\MediaPost;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class MediaPostComponent extends BaseComponent
{
    use WithPagination;

    public $headers = [
        'id' => 'ID',
        'fullname' => 'Nombres',
        'post_type' => 'Tipo',
        'created_at' => 'Publicado',
        'not' => '',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), array('not', 'fullname'));
        $findIn = [];
        $table = 'media_posts';

        foreach ($_pre as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = MediaPost::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
                $query->orWhere(DB::raw("CONCAT(users.user_firstname, ' ', users.user_lastname)"), 'LIKE', '%' . $this->keyWord . '%');
            })
            ->select($table . ".*")
            ->join('users', 'users.id', '=', $table . ".user_id")
            ->selectRaw('CONCAT(users.user_firstname," ",users.user_lastname) as fullname')
            ->paginate($this->limit);

        $data['_title'] = 'Posts';

        $this->emit('refreshComponent');

        return view('livewire.social.admin.media-post-component', $data)->layout('layouts.backend');
    }

    public function deleteRegister()
    {
        $data = MediaPost::find($this->deleteId);
        $data->delete();
    }
}
