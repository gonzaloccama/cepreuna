<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PostComponent extends BaseComponent
{
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $short_description;
    public $description;
    public $category_post;
    public $author;
    public $tags;
    public $status;
    public $created_at;

    public $image;
    public $newImage;
    public $editImage;

    public $findURL;

    public $headers = [
        'image' => 'Imagen',
        'title' => 'Noticia',
        'category' => 'Categoria',
        'fullname' => 'Autor',
        'status' => 'Est.',
        'created_at' => 'Fecha',
        'not' => '',
    ];

    protected $attributes = [
        'title' => '<b><ins>noticia</ins></b>',
        'image' => '<b><ins>imagen</ins></b>',
        'newImage' => '<b><ins>imagen</ins></b>',
        'short_description' => '<b><ins>descripción corta</ins></b>',
        'description' => '<b><ins>contenido</ins></b>',
        'category_post' => '<b><ins>categoria</ins></b>',
        'author' => '<b><ins>autor</ins></b>',
        'tags' => '<b><ins>tags</ins></b>',
        'status' => '<b><ins>Estado</ins></b>',
    ];

    protected $rules = [
        'title' => 'required|min:3',
        'image' => 'required|mimes:jpeg,jpg,png|max:360',
        'newImage' => 'nullable|mimes:jpeg,jpg,png|max:360',
        'short_description' => 'required|min:56|max:160',
        'description' => 'required|min:96',
        'category_post' => 'required',
        'author' => 'nullable',
        'tags' => 'nullable',
        'status' => 'nullable',
    ];

    public function mount()
    {
        $this->fieldSort = 'created_at';
        $this->sort = 'desc';
        $this->iconSort = 'la la-arrow-up';

        $this->image_path = 'images/post/';
        $this->author = auth()->user()->id;
        $this->status = 1;
    }

    public function render()
    {
        $findIn = array_diff(array_keys($this->headers), array('not', 'created_at', 'fullname'));

        $data['results'] = Post::orderBy($this->fieldSort, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
                $query->orWhere(DB::raw("CONCAT(users.user_firstname, ' ', users.user_lastname)"), 'LIKE', '%' . $this->keyWord . '%');
            })
            ->select('posts.*')
            ->join('post_categories', 'post_categories.id', '=', 'category_post')
            ->join('users', 'users.id', '=', 'author')
            ->selectRaw('post_categories.category')
            ->selectRaw('CONCAT(users.user_firstname," ",users.user_lastname) as fullname')
            ->paginate($this->limit);
        $data['_title'] = 'Noticias';

        $this->emit('refreshComponent');

        return view('livewire.admin.post-component', $data)->layout('layouts.backend');
    }

    public function updatingKeyWord()
    {
        $this->resetPage();
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function openAdd()
    {
        $this->frame = 'add';
        $this->emit('refreshSection');
    }

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs($this->image_path, $imageName);

        $data = new Post();

        $data->title = $this->title;
        $data->short_description = $this->short_description;
        $data->description = $this->description;
        $data->category_post = $this->category_post;
        $data->author = $this->author;
        $data->tags = $this->tags;

        $data->status = $this->status ? "1" : "0";
        $data->image = $imageName;

        if ($data->save()) {
            $this->emit('alertAdd');
            $this->closeFrame();
        }
    }

    public function openEdit($id = 0, $view = false)
    {

        $this->itemId = $id;
        $data = Post::where('id', $this->itemId)->first();

        $this->title = $data->title;
        $this->short_description = $data->short_description;
        $this->description = $data->description;
        $this->category_post = !$view ? $data->category_post : $data->category->category;
        $this->author = !$view ? $data->author : $data->user->name;
        $this->tags = $data->tags;
        $this->status = (int)$data->status;
        $this->editImage = $data->image;
        $this->created_at = $data->created_at;

        if (!$view) {
            $this->frame = 'edit';
            $this->emit('refreshSection');
        } else {
            $this->frame = 'view';
        }
    }

    public function updateRegister()
    {
        if ($this->itemId) {

            $rules = $this->rules;
            unset($rules['image']);
            $this->validate($rules, [], $this->attributes);

            if ($this->newImage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
                $this->newImage->storeAs($this->image_path, $imageName);
            }

            $data = Post::find($this->itemId);

            $data->title = $this->title;
            $data->short_description = $this->short_description;
            $data->description = $this->description;
            $data->category_post = $this->category_post;
            $data->author = $this->author;
            $data->tags = $this->tags;
            $data->status = $this->status ? "1" : "0";
            $data->image = $this->newImage ? $imageName : $this->editImage;

            if ($data->save()) {
                if ($this->editImage && $this->newImage) {
                    File::delete(
                        public_path('assets/' . $this->image_path . $this->editImage)
                    );
                }
                $this->emit('alertUpdate');
                $this->closeFrame();
            }
        }
    }

    public function deleteRegister()
    {
        $data = Post::find($this->deleteId);
        $pathImage = $data->image;
        if ($data->delete()) {
            if ($pathImage) {
                File::delete(
                    public_path('assets/' . $this->image_path . $pathImage)
                );
            }
            $this->frame = 'index';
            $this->cleanItems();
        }
    }

    public function closeFrame()
    {
        $this->frame = 'index';
        $this->cleanItems();
    }

    public function cleanItems()
    {
        $this->deleteId = null;
        $this->itemId = null;

        $this->title = null;
        $this->short_description = null;
        $this->description = null;
        $this->category_post = null;
        $this->author = auth()->user()->id;
        $this->tags = null;
        $this->image = null;
        $this->newImage = null;
        $this->editImage = null;
        $this->status = 1;

        Cache::flush();

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
