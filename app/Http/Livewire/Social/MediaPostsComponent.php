<?php

namespace App\Http\Livewire\Social;

use App\Models\MediaPost;
use App\Models\MediaPostsComment;
use App\Models\MediaPostsCommentsReaction;
use App\Models\MediaPostsFile;
use App\Models\MediaPostsPhoto;
use App\Models\MediaPostsReaction;
use App\Models\MediaPostsSavedItem;
use App\Models\MediaPostsVideo;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Image;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaPostsComponent extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshComponent' => '$refresh', 'updateKeySearch' => 'updateKeyWord', 'activeConfirm' => 'deletePost'];

    public $keyWord;
    public $load;

    public $user_id;
    public $user_type;
    public $in_group;
    public $group_id;
    public $group_approved;
    public $in_event;
    public $event_id;
    public $event_approved;
    public $post_type;
    public $origin_id;
    public $privacy;
    public $text;

    /***  Begin post photo  ***/
    public $post_id;
    public $album_id;
    public $photo_source;
    public $newPhotoSource;
    /***  End post photo  ***/

    /***  Begin post video  ***/
    public $video_post_id;
    public $video_source;
    public $newVideoSource;
    /***  End post photo  ***/

    /***  Begin post file  ***/
    public $file_post_id;
    public $file_source;
    public $newFileSource;
    /***  End post file  ***/

    public $findUrl;
    public $isProfile;
    public $postId;
    public $postTypeDel;

    public $profile_id;
    public $saved;
    public $less_comment;
    public $all_comment;

    protected $attributes = [
        'photo_source' => '<b><ins>Foto o Imagen</ins></b>',
        'video_source' => '<b><ins>Video</ins></b>',
        'file_source' => '<b><ins>PDF</ins></b>',
    ];

    protected $rules = [
        'photo_source' => 'nullable',
        'video_source' => 'nullable|mimes:mp4|max:6000',
        'file_source' => 'nullable|mimes:pdf|max:2000',
    ];

    public function mount($is_profile, $id = null, $saved = false)
    {
        $this->privacy = 'public';
        $this->load = 10;
        $this->post_type = '';

        $this->findUrl = [];
        $this->less_comment = 2;

        if ($is_profile) {
            $this->isProfile = $is_profile;
            $this->profile_id = $id;
        }

        if ($saved) {
            $this->saved = true;
        } else {
            $this->saved = false;
        }
    }

    public function render()
    {
        $searchIn = ['post_type', 'text'];

        $data['posts'] = MediaPost::orderBy('created_at', 'desc')
            ->orWhere(function ($query) use ($searchIn) {
                foreach ($searchIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                    $query->orWhere(DB::raw("CONCAT(user_firstname, ' ', user_lastname)"), 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->when($this->isProfile, function ($query) {
                $query->where('user_id', $this->profile_id);
            })
            ->when($this->isProfile != 1, function ($query) {
                $query->where('privacy', 'public');
            })
            ->join('users', 'users.id', '=', 'media_posts.user_id')
            ->when($this->saved, function ($query) {
                $query->join('media_posts_saved_items', 'media_posts.id', '=', 'media_posts_saved_items.post_id');
            })
            ->select('media_posts.*', 'users.username')
            ->selectRaw('CONCAT(users.user_firstname," ",users.user_lastname) as fullname')
            ->paginate($this->load);

        $this->emit('refreshContent');

        return view('livewire.social.media-posts-component', $data);
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function updatePrivacy($privacy)
    {
        $this->privacy = $privacy;
    }

    public function updatePostType($post_type)
    {
        $this->post_type = $post_type;
    }

    public function updateKeyWord($word)
    {
        $this->keyWord = $word['keyWord'];
    }

    public function loadMore()
    {
        $this->load += 5;
    }

    public function viewCommentAll($post_id)
    {
        $this->all_comment = $post_id;
    }

    public function storePost()
    {
        $this->validate($this->rules, [], $this->attributes);

        $postID = null;

        if ($this->text || $this->photo_source || $this->video_source || $this->file_source) {

            $post = new MediaPost();

            $post->user_id = auth()->user()->id;
            $post->user_type = 'user';
            $post->in_group = '0';
            $post->group_id = 0;
            $post->group_approved = '1';
            $post->in_event = '0';
            $post->event_id = 0;
            $post->event_approved = '0';
            $post->post_type = $this->post_type;
            $post->origin_id = 0;
            $post->privacy = $this->privacy;
            $post->text = $this->text;

            if ($post->save()) {
                $postID = $post->id;
                $this->emit('closeModalPost');
                if (!$this->photo_source && !$this->video_source && !$this->file_source) {
                    $this->cleanItems();
                }
            }
            /*** Begin Upload Image/Photo ***/
            if ($this->photo_source) {
                // create an image manager instance with favored driver

                $photoSourceName = Carbon::now()->timestamp . '.' . $this->photo_source->extension();
                $photo_resize = Image::make($this->photo_source->getRealPath());
                $photo_resize->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $photo_resize->save('assets/uploads/users/posts-photos/' . $photoSourceName);
//                $this->photo_source->storeAs('uploads/users/posts-photos', $photoSourceName);

                $postPhoto = new MediaPostsPhoto();

                $postPhoto->post_id = $postID;
                $postPhoto->album_id = 0;
                $postPhoto->source = $photoSourceName;

                if ($postPhoto->save()) {
                    $this->cleanItems();
                }
            }
            /*** End Upload Image/Photo ***/

            /*** Begin Upload Video ***/
            if ($this->video_source) {
                $videoSourceName = Carbon::now()->timestamp . '.' . $this->video_source->extension();
                $this->video_source->storeAs('uploads/users/posts-videos', $videoSourceName);

                $postVideo = new MediaPostsVideo();

                $postVideo->post_id = $postID;
                $postVideo->thumbnail = '';
                $postVideo->source = $videoSourceName;

                if ($postVideo->save()) {
                    $this->cleanItems();
                }
            }
            /*** End Upload Video ***/

            /*** Begin Upload Video ***/
            if ($this->file_source) {

                $str = substr($this->file_source->getClientOriginalName(), 0, strlen($this->file_source->getClientOriginalName()) - 4);
                $str .= ' ' . Carbon::now()->toDateString();
                $fileSourceName = $str . '.' . $this->file_source->extension();
                $this->file_source->storeAs('uploads/users/posts-files', $fileSourceName);

                $postFile = new MediaPostsFile();

                $postFile->post_id = $postID;
//                $postFile->thumbnail = '';
                $postFile->source = $fileSourceName;

                if ($postFile->save()) {
                    $this->cleanItems();
                }
            }
            /*** End Upload Video ***/
        }
    }

    public function postShared($post_id = null)
    {
        if ($post_id) {
            $this->origin_id = $post_id;
            $this->post_type = 'shared';
        } else {

            $post = new MediaPost();

            $post->user_id = auth()->user()->id;
            $post->user_type = 'user';
            $post->in_group = '0';
            $post->group_id = 0;
            $post->group_approved = '1';
            $post->in_event = '0';
            $post->event_id = 0;
            $post->event_approved = '0';
            $post->post_type = $this->post_type;
            $post->origin_id = $this->origin_id;
            $post->privacy = $this->privacy;
            $post->text = $this->text;
            $post->shares = 0;

            if ($post->save()) {
                $this->emit('closeModalPostShared');
                $this->cleanItems();
            }
        }

    }

    public function PostSaved($post_id)
    {
        if ($post_id) {
            $postSaved = new MediaPostsSavedItem();

            $postSaved->post_id = $post_id;
            $postSaved->user_id = auth()->user()->id;

            if ($postSaved->save()) {
                $this->emit('alertSaved');
                $this->cleanItems();
            }
        }
    }

    public function storePostsReaction($post_id, $user_id, $reaction)
    {
        if ($reaction) {

            $postsReaction = new MediaPostsReaction();

            $postsReaction->post_id = $post_id;
            $postsReaction->user_id = $user_id;
            $postsReaction->reaction = $reaction;

//            dd($postsReaction);
            $postsReaction->save();
        }

//        $like = [
//            'like-my' => 'reaction_like_count', 'heart-my' => 'reaction_love_count', 'happy-my' => 'reaction_yay_count'
//        ];
//
//        $cLike = MediaPost::find($post_id);
//
//        foreach ($like as $key => $l) {
//            $cLike[$l] = \App\Models\MediaPostsReaction::where('post_id', $post_id)
//                ->where('reaction', $key)->pluck('reaction')->count();
//        }
//
//        $cLike->save();
    }

    public function updatePostsReaction($myLike_id, $reaction)
    {
        if ($myLike_id) {

            $postsReaction = MediaPostsReaction::find($myLike_id);

            $postsReaction->reaction = $reaction;

            $postsReaction->save();


//            $like = [
//                'like-my' => 'reaction_like_count', 'heart-my' => 'reaction_love_count', 'happy-my' => 'reaction_yay_count'
//            ];
//
//            $cLike = MediaPost::find($postsReaction->post_id);
//
//            foreach ($like as $key => $l) {
//                $cLike[$l] = \App\Models\MediaPostsReaction::where('post_id', $postsReaction->post_id)
//                    ->where('reaction', $key)->pluck('reaction')->count();
//            }
//
//            $cLike->save();
        }

    }

    public function storePostsCommentsReaction($comment_id, $user_id, $reaction)
    {
        if ($reaction) {

            $postsCommentReaction = new MediaPostsCommentsReaction();

            $postsCommentReaction->comment_id = $comment_id;
            $postsCommentReaction->user_id = $user_id;
            $postsCommentReaction->reaction = $reaction;

            $postsCommentReaction->save();
        }
    }

    public function updatePostsCommentsReaction($myLike_id, $reaction)
    {
        if ($myLike_id) {

            $postsCommentReaction = MediaPostsCommentsReaction::find($myLike_id);

            $postsCommentReaction->reaction = $reaction;

            $postsCommentReaction->save();
        }
    }

    public function cleanItems()
    {
        $this->user_id = null;
        $this->user_type = null;
        $this->in_group = null;
        $this->group_id = null;
        $this->group_approved = null;
        $this->in_event = null;
        $this->event_id = null;
        $this->event_approved = null;
        $this->post_type = '';
        $this->origin_id = null;
        $this->privacy = 'public';
        $this->text = null;

        $this->photo_source = null;
        $this->video_source = null;
        $this->file_source = null;
        $this->findUrl = [];

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function cleanItemsDel()
    {
        $this->postId = null;
        $this->postTypeDel = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deletePostConfirm($post_id, $post_type = '')
    {
        $this->postId = $post_id;
        $this->postTypeDel = $post_type;
        $this->emit('deleteAlert');
    }

    public function deletePost()
    {
//        dd(public_path('uploads/users/posts-' . $post_type . 's/'));
        if ($this->postId) {
            $post = MediaPost::find($this->postId);

            if ($post->delete() && $this->postTypeDel != '') {
                $comments = MediaPostsComment::where('node_id', $post->id)->get();
                MediaPostsComment::where('node_id', $post->id)->delete();
                MediaPostsReaction::where('post_id', $post->id)->delete();

                foreach ($comments as $comment) {
                    MediaPostsCommentsReaction::where('comment_id', $comment->id)->delete();
                }

                if ($file = $this->deletePostType($this->postId, $this->postTypeDel)) {
                    File::delete(
                        public_path('assets/uploads/users/posts-' . $this->postTypeDel . 's/' . $file->source)
                    );
                    $file->delete();
                    $this->cleanItemsDel();
                }
            }
        }
    }

    private function deletePostType($post_id, $post_type)
    {
        switch ($post_type) {
            case 'photo':
                return MediaPostsPhoto::where('post_id', $post_id)->first();
            case 'video':
                return MediaPostsVideo::where('post_id', $post_id)->first();
            case 'file':
                return MediaPostsFile::where('post_id', $post_id)->first();
        }
    }

    public function deletePostsComment($comment_id)
    {
        if ($comment_id) {
            $postsComment = MediaPostsComment::find($comment_id);
            $postsComment->delete();
        }
    }

    public function deleteLike($like_id)
    {
        if ($like_id) {
            $PostsReaction = MediaPostsReaction::find($like_id);
            $PostsReaction->delete();
        }
    }

    public function deleteCommentsLike($like_id)
    {
        if ($like_id) {
            $PostsCommentsReaction = MediaPostsCommentsReaction::find($like_id);
            $PostsCommentsReaction->delete();
        }
    }

    public function deleteFilePost()
    {
        $this->photo_source = null;
        $this->video_source = null;
        $this->file_source = null;
        $this->post_type = '';

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
