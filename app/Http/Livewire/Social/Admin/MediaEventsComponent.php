<?php

namespace App\Http\Livewire\Social\Admin;

use App\Http\Livewire\Admin\BaseComponent;
use App\Models\MediaEvent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MediaEventsComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $headers = [
        'event_title' => 'Evento',
        'fullname' => 'Admin',
        'event_privacy' => 'Privacidad',
        'event_start_date' => 'Inicio',
        'event_end_date' => 'Final.',
        'created_at' => 'Creación',
        'not' => '',
    ];

    protected $attributes = [
        'username' => '<b><ins>Nombre de usuario</ins></b>',
    ];
    protected $rules = [
        'username' => 'required|min:3|unique:users',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->image_path = 'images/events/';
    }

    public function render()
    {
        $_pre = array_diff(array_keys($this->headers), array('not', 'fullname'));
        $findIn = [];
        $table = 'media_events';

        foreach ($_pre as $item){
            $findIn[] = $table.'.'.$item;
        }

        $data['results'] = MediaEvent::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
                $query->orWhere(DB::raw("CONCAT(users.user_firstname, ' ', users.user_lastname)"), 'LIKE', '%' . $this->keyWord . '%');
            })
            ->select($table.".*")
            ->join('users', 'users.id', '=', $table.".event_admin")
            ->selectRaw('CONCAT(users.user_firstname," ",users.user_lastname) as fullname')
            ->paginate($this->limit);

        $data['_title'] = 'Eventos';

        $this->emit('refreshComponent');

        return view('livewire.social.admin.media-events-component', $data)->layout('layouts.backend');
    }
}
