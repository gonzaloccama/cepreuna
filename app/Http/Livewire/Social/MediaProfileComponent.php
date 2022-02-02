<?php

namespace App\Http\Livewire\Social;

use App\Models\MediaPost;
use App\Models\MediaPostsPhoto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaProfileComponent extends Component
{
    use WithFileUploads;

    public $tab_pane;
    public $privacy;
    public $post_type;
    public $bg_source;
    public $new_bg_source;

    public $profile_source;
    public $new_profile_source;

    public $profile_id;
    public $modal;

    protected $attributes = [
        'bg_source' => '<b><ins>Imagen de fondo de perfil</ins></b>',
        'profile_source' => '<b><ins>Foto de perfil</ins></b>',
    ];

    protected $rules = [
        'bg_source' => 'nullable|mimes:png,jpg,jpeg',
        'profile_source' => 'nullable|mimes:png,jpg,jpeg',
    ];

    public function mount($id = null)
    {
        $this->privacy = 'me';
        $this->active_tab('timeline');
        $this->modal = 'profile';

        if ($id) {
            $this->profile_id = base64_decode($id);
        } else {
            $this->profile_id = auth()->user()->id;
        }
    }

    public function render()
    {
        $data['_title'] = User::find($this->profile_id)->fullname;
        $this->emit('refreshContent');

        return view('livewire.social.media-profile-component', $data)->layout('layouts.social');
    }

    public function active_tab($tab_pane)
    {
        $this->tab_pane = $tab_pane;
    }

    public function updatePrivacy($privacy)
    {
        $this->privacy = $privacy;
    }

    public function updatePostType($post_type)
    {
        $this->post_type = $post_type;
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function open_modal($modal){
        $this->modal = $modal;
    }

    public function storeBgProfile()
    {
        if ($this->bg_source || $this->profile_source) {
            $this->validate($this->rules, [], $this->attributes);

            $data = new MediaPost();

            $data->user_id = $this->profile_id;
            $data->user_type = 'user';
            $data->in_group = '0';
            $data->group_id = 0;
            $data->group_approved = '1';
            $data->in_event = '0';
            $data->event_id = 0;
            $data->event_approved = '0';
            $data->post_type = $this->post_type;
            $data->origin_id = 0;
            $data->privacy = $this->privacy;
            $data->text = null;

            $postID = $data->getNextId();

            if ($data->save()) {
                $this->emit('profile_picture');
                if (!$this->bg_source && !$this->profile_source) {
                    $this->cleanItems();
                }
            }

            if ($this->bg_source) {

                $photoSourceName = Carbon::now()->timestamp . '.' . $this->bg_source->extension();
                $photo_resize = Image::make($this->bg_source->getRealPath());
                $photo_resize->resize(1920, 480);
                $photo_resize->save('assets/images/users/' . $photoSourceName);

                $postPhoto = new MediaPostsPhoto();

                $postPhoto->post_id = $postID;
                $postPhoto->album_id = 1;
                $postPhoto->source = $photoSourceName;

                $photoNextID = $postPhoto->getNextId();

                if ($postPhoto->save()) {
                    $this->cleanItems();
                }

                $user_picture = User::find($this->profile_id);

                $user_picture->user_picture = $photoSourceName;
                $user_picture->user_picture_id = $photoNextID;

                if ($user_picture->save()) {
                    $this->cleanItems();
                }
            }
            if ($this->profile_source) {
                $photoSourceName = Carbon::now()->timestamp . '.' . $this->profile_source->extension();
                $photo_resize = Image::make($this->profile_source->getRealPath());
                $photo_resize->resize(126, 126);
                $photo_resize->save('assets/images/users/' . $photoSourceName);

                $postPhoto = new MediaPostsPhoto();

                $postPhoto->post_id = $postID;
                $postPhoto->album_id = 1;
                $postPhoto->source = $photoSourceName;

                $photoNextID = $postPhoto->getNextId();

                if ($postPhoto->save()) {
                    $this->cleanItems();
                }

                $user_picture = User::find($this->profile_id);

                $user_picture->user_cover = $photoSourceName;
                $user_picture->user_cover_id = $photoNextID;

                if ($user_picture->save()) {
                    $this->cleanItems();
                }
            }
        }
    }

    public function deleteFilePost()
    {
        $this->cleanItems();
    }

    public function cleanItems()
    {
        $this->privacy = 'me';
        $this->post_type = null;
        $this->bg_source = null;
        $this->new_bg_source = null;
        $this->profile_source = null;
        $this->new_profile_source = null;
    }


}
