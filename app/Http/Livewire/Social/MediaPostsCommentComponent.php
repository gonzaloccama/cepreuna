<?php

namespace App\Http\Livewire\Social;

use App\Models\MediaEmojis;
use App\Models\MediaPostsComment;
use Livewire\Component;

class MediaPostsCommentComponent extends Component
{
    public $node_id;
    public $node_type;
    public $user_id;
    public $user_type;
    public $text;
    public $image;

    public function mount($user, $post, $post_type)
    {
        $this->user_id = $user;
        $this->node_id = $post;
        $this->node_type = "$post_type";
        $this->user_type = 'user';
        $this->text = '';
    }

    public function render()
    {
        $data['emojis'] = MediaEmojis::all();

        return view('livewire.social.media-posts-comment-component', $data);
    }

    public function storePostsComment()
    {
        if ($this->text != null) {
            $postsComment = new MediaPostsComment();

            $postsComment->node_id = $this->node_id;
            $postsComment->node_type = $this->node_type;
            $postsComment->user_id = $this->user_id;
            $postsComment->user_type = $this->user_type;
            $postsComment->text = $this->text;
//        $postsComment->image = $this->image;
            if ($postsComment->save()) {
                $this->emitTo('social.media-posts-component', 'refreshComponent');
                $this->cleanItems();
            }
        }
    }

    public function updateText($text)
    {
        if ($text && $text != '') {
            $this->text .= ' ' . $text;
        }
    }

    public function cleanItems()
    {
        $this->user_type = 'user';
        $this->text = null;
    }
}
