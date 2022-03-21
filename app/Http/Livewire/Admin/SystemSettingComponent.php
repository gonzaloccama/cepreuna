<?php

namespace App\Http\Livewire\Admin;

use App\Models\SystemSetting;
use Cache;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class SystemSettingComponent extends Component
{
    use WithFileUploads;

    public $frame;
    public $image_path;

    public $website_name;
    public $website_short_description;
    public $website_executive;
    public $website_phones;
    public $website_emails;
    public $website_addresses;
    public $website_media_social;
    public $website_facebook_page;
    public $website_mission;
    public $website_vision;
    public $website_objectives;
    public $website_values;
    public $website_history;
    public $updated_at;

    public $website_logo_1st;
    public $edit_logo_1st;
    public $website_logo_2sd;
    public $edit_logo_2sd;
    public $website_favicon;
    public $edit_favicon;

    public $title;

    protected $attributes = [
        'website_name' => '<b><ins>Nombre de la página</ins></b>',
        'website_short_description' => '<b><ins>Descripción corta</ins></b>',
        'website_executive' => '<b><ins>Presidente</ins></b>',
        'website_phones.0' => '<b><ins>Telefono</ins></b>',
        'website_phones.*' => '<b><ins>Telefono</ins></b>',
        'website_emails.0' => '<b><ins>Email</ins></b>',
        'website_emails.*' => '<b><ins>Email</ins></b>',
        'website_addresses.0' => '<b><ins>Dirección</ins></b>',
        'website_addresses.*' => '<b><ins>Dirección</ins></b>',
        'website_media_social.0.facebook' => '<b><ins>Facebook</ins></b>',
        'website_media_social.0.youtube' => '<b><ins>YouTube</ins></b>',
        'website_media_social.0.instagram' => '<b><ins>Instagram</ins></b>',
        'website_media_social.0.twitter' => '<b><ins>Twitter</ins></b>',
        'website_media_social.0.linkedin' => '<b><ins>Linkedin</ins></b>',
        'website_media_social.0.whatsapp' => '<b><ins>WhatsApp</ins></b>',
        'website_facebook_page' => '<b><ins>URL de la página Facebook</ins></b>',
        'website_mission' => '<b><ins>Misión</ins></b>',
        'website_vision' => '<b><ins>Visión</ins></b>',
        'website_objectives' => '<b><ins>Objetivo General</ins></b>',
        'website_values.0' => '<b><ins>Objetivo Específico</ins></b>',
        'website_values.*' => '<b><ins>Objetivo Específico</ins></b>',
        'website_history' => '<b><ins>Historia</ins></b>',
        'website_logo_1st' => '<b><ins>Logo</ins></b>',
        'website_logo_2sd' => '<b><ins>Logo blanco</ins></b>',
        'website_favicon' => '<b><ins>Favicon</ins></b>',
    ];

    public $general = [
        'website_name' => 'required|min:3',
        'website_short_description' => 'required|min:36|max:220',
        'website_executive' => 'required',
        'website_phones.0' => 'required|numeric|digits:9',
        'website_phones.*' => 'nullable|numeric|digits:9',
        'website_emails.0' => 'required|email',
        'website_emails.*' => 'nullable|email',
        'website_addresses.0' => 'required',
        'website_addresses.*' => 'nullable',
    ];

    public $logo = [
        'website_logo_1st' => 'nullable|mimes:png|max:124',
        'website_logo_2sd' => 'nullable|mimes:png|max:124',
        'website_favicon' => 'nullable|mimes:png|max:124',
    ];

    public $mission_and_vision = [
        'website_mission' => 'required|min:126',
        'website_vision' => 'required|min:126',
    ];

    public $medias = [
        'website_media_social.0.facebook' => 'required|url',
        'website_media_social.0.youtube' => 'nullable|url',
        'website_media_social.0.instagram' => 'nullable|url',
        'website_media_social.0.twitter' => 'nullable|url',
        'website_media_social.0.linkedin' => 'nullable|url',
        'website_media_social.0.whatsapp' => 'nullable|numeric|digits:9',
        'website_facebook_page' => 'nullable|url',
    ];

//    protected $rules = [
//        'website_objectives' => 'nullable|min:126',
//        'website_history' => 'required|min:126',
//    ];

    protected $others = [
        'website_objectives' => 'required|min:64',
        'website_values.0' => 'nullable|min:64',
        'website_values.*' => 'nullable|min:64',
        'website_history' => 'required|min:64',
    ];

    public function mount()
    {
        $this->general();
        $this->image_path = 'images/logo/';
    }

    public function render()
    {
        $data['_title'] = 'WebSite';
        $this->emit('refreshComponent');

        return view('livewire.admin.system-setting-component', $data)->layout('layouts.backend');
    }

    public function updated($property)
    {
        $this->validateOnly(
            $property,
            array_merge($this->general, $this->logo, $this->mission_and_vision, $this->medias),
            [],
            $this->attributes
        );
    }

    public function general($toSave = 0)
    {
        $data = SystemSetting::find(1);
        if (!$toSave) {
            $this->website_name = $data->website_name;
            $this->website_short_description = $data->website_short_description;
            $this->website_executive = $data->website_executive;
            $this->website_phones = json_decode($data->website_phones);
            $this->website_emails = json_decode($data->website_emails);
            $this->website_addresses = json_decode($data->website_addresses);

            $this->edit_logo_1st = $data->website_logo_1st;
            $this->updated_at = $data->updated_at;

            $this->title = 'General';
            $this->frame = 'index';
        } else {
            $this->validate($this->general, [], $this->attributes);

            $data->website_name = $this->website_name;
            $data->website_short_description = $this->website_short_description;
            $data->website_executive = $this->website_executive;
            $data->website_phones = json_encode(array_values($this->website_phones));
            $data->website_emails = json_encode(array_values($this->website_emails));
            $data->website_addresses = json_encode(array_values($this->website_addresses));

            if ($data->save()) {
                $this->frame = 'index';
                $this->emit('alertUpdate');
            }
        }
    }

    public function logo($toSave = 0)
    {
        $data = SystemSetting::find(1);
        if (!$toSave) {

            $this->edit_logo_1st = $data->website_logo_1st;
            $this->edit_logo_2sd = $data->website_logo_2sd;
            $this->edit_favicon = $data->website_favicon;

            $this->updated_at = $data->updated_at;

            $this->title = 'Logos';
            $this->frame = 'imgs';
        } else {
            $this->validate($this->logo, [], $this->attributes);

            if ($this->website_logo_1st) {
                $logo_normal = 'logo.' . $this->website_logo_1st->extension();
                $this->website_logo_1st->storeAs($this->image_path, $logo_normal);
            }

            if ($this->website_logo_2sd) {
                $logo_white = 'logo-white.' . $this->website_logo_2sd->extension();
                $this->website_logo_2sd->storeAs($this->image_path, $logo_white);
            }

            if ($this->website_favicon) {
                $favicon = 'favicon.' . $this->website_favicon->extension();
                $this->website_favicon->storeAs($this->image_path, $favicon);
            }

            $data->website_logo_1st = $this->website_logo_1st ? $logo_normal : $data->website_logo_1st;
            $data->website_logo_2sd = $this->website_logo_2sd ? $logo_white : $data->website_logo_2sd;
            $data->website_favicon = $this->website_favicon ? $favicon : $data->website_favicon;

            if ($data->save()) {
                $this->frame = 'index';
                $this->emit('alertUpdate');
            }
        }
    }

    public function missionAndVision($toSave = 0)
    {
        $data = SystemSetting::find(1);
        if (!$toSave) {

            $this->website_mission = $data->website_mission;
            $this->website_vision = $data->website_vision;

            $this->edit_logo_1st = $data->website_logo_1st;
            $this->updated_at = $data->updated_at;

            $this->title = 'Misión y Visón';
            $this->frame = 'mission-and-vision';
        } else {
            $this->validate($this->mission_and_vision, [], $this->attributes);

            $data->website_mission = $this->website_mission;
            $data->website_vision = $this->website_vision;

            if ($data->save()) {
                $this->frame = 'index';
                $this->emit('alertUpdate');
            }
        }
    }

    public function mediaSocial($toSave = 0)
    {
        $data = SystemSetting::find(1);
        if (!$toSave) {

            $this->website_media_social = json_decode($data->website_media_social);
            $this->website_facebook_page = $data->website_facebook_page;

            $this->edit_logo_1st = $data->website_logo_1st;
            $this->updated_at = $data->updated_at;

            $this->title = 'Redes Sociales';
            $this->frame = 'media-social';
        } else {
            $this->validate($this->medias, [], $this->attributes);

            $data->website_media_social = $this->website_media_social;
            $data->website_facebook_page = $this->website_facebook_page;

            if ($data->save()) {
                $this->frame = 'index';
                $this->emit('alertUpdate');
            }
        }
    }

    public function others($toSave = 0)
    {
        $data = SystemSetting::find(1);
        if (!$toSave) {

            $this->website_values = json_decode($data->website_values);
            $this->website_objectives = $data->website_objectives;
            $this->website_history = $data->website_history;

            $this->edit_logo_1st = $data->website_logo_1st;
            $this->updated_at = $data->updated_at;

            $this->title = 'Otros';
            $this->frame = 'others';
        } else {
            $this->validate($this->others, [], $this->attributes);

            $data->website_values = $this->website_values;
            $data->website_objectives = $this->website_objectives;
            $data->website_history = $this->website_history;

//            dd($data);
            if ($data->save()) {
                $this->frame = 'index';
                $this->emit('alertUpdate');
            }
        }
    }

    public function closeFrame()
    {
        $this->cleanItems();
        $this->general();
    }

    public function cleanItems()
    {
        $this->website_name = null;
        $this->website_short_description = null;
        $this->website_executive = null;
        $this->website_phones = null;
        $this->website_emails = null;
        $this->website_addresses = null;
        $this->website_media_social = null;
        $this->website_facebook_page = null;
        $this->website_mission = null;
        $this->website_vision = null;
        $this->website_objectives = null;
        $this->website_values = null;
        $this->website_history = null;
        $this->updated_at = null;
        $this->website_logo_1st = null;
        $this->edit_logo_1st = null;
        $this->website_logo_2sd = null;
        $this->edit_logo_2sd = null;
        $this->website_favicon = null;
        $this->edit_favicon = null;

        Cache::flush();

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
