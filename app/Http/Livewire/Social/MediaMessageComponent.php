<?php

namespace App\Http\Livewire\Social;

use App\Models\MediaEmojis;
use App\Models\MediaMessage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Exception;

class MediaMessageComponent extends Component
{
    public $sender;
    public $message = '';
    public $allMessages;

    public $keyWord = '';
    public $moreMessages = 15;
    public $moreUsers = 10;

    public function mountData()
    {
        try {
            if (isset($this->sender->id)) {
                $this->allMessages = MediaMessage::orderBy('created_at', 'desc')
                    ->where('from_user', auth()->user()->id)
                    ->where('to_user', $this->sender->id)
                    ->orWhere('from_user', $this->sender->id)
                    ->where('to_user', auth()->user()->id)
                    ->take($this->moreMessages)->get();

                $not_read = MediaMessage::where('from_user', $this->sender->id)
                    ->where('to_user', auth()->user()->id);
                $not_read->update(['is_read' => 1]);
            }
        } catch (Exception $e) {
        }
    }

    public function render()
    {
        $data['_title'] = 'Chat';

        $data['users'] = User::orderBy('user_is_online', 'desc')->orderBy('user_last_activity', 'desc')
            ->orWhere(function ($query) {
                $query->orWhere(DB::raw("CONCAT(user_firstname, ' ', user_lastname)"), 'LIKE', '%' . $this->keyWord . '%');
            })
            ->paginate($this->moreUsers);

        $data['sender'] = $this->sender;
        $data['emojis'] = MediaEmojis::all();

        $this->emit('refreshContent');

        return view('livewire.social.media-message-component', $data)->layout('layouts.social');
    }

    public function getUser($id)
    {
        try {
            if ($id) {
                $this->sender = User::find($id);
                $this->allMessages = MediaMessage::orderBy('created_at', 'desc')
                    ->where('from_user', auth()->user()->id)
                    ->where('to_user', $id)
                    ->orWhere('from_user', $id)
                    ->where('to_user', auth()->user()->id)
                    ->take($this->moreMessages)->get();

                $this->moreMessages = 15;
            }
        } catch (Exception $e) {
        }
    }

    public function sendMessage()
    {
        if ($this->message) {
            $data = new MediaMessage();

            $data->from_user = auth()->user()->id;
            $data->to_user = $this->sender->id;
            $data->message = $this->message;

            if ($data->save()) {
                $this->cleanItems();
            }
        }
    }

    public function updateMoreMessages()
    {
        $this->moreMessages += 10;
    }

    public function updateMoreUsers()
    {
        $this->moreUsers += 10;
    }

    public function resetMoreUsers()
    {
        $this->moreUsers = 10;
    }

    public function updateText($text)
    {
        if ($text && $text != '') {
            $this->message .= ' ' . $text;
        }
    }

    public function cleanItems()
    {
        $this->message = null;
    }
}
