<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required|min:5')]
    public $name;

    #[Validate('required|min:10')]
    public $description;

    /** @var TemporaryUploadedFile|null $cover */
    #[Validate('image|max:2048|nullable')]
    public $cover;

    #[Validate('required|integer')]
    public $rooms;

    #[Validate('required|integer')]
    public $bedrooms;

    #[Validate('integer')]
    public $floor = 0;

    #[Validate('required|integer')]
    public $surface;

    #[Validate('required|integer')]
    public $price;

    #[Validate('required|integer')]
    public $user_id;

    #[Validate('required|string|min:4')]
    public $city;

    #[Validate('required|string|min:5')]
    public $address;

    #[Validate('boolean')]
    public $sold = 0;

    #[Validate('nullable')]
    public $categories=[];
    public $oldPhoto;
    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->name = $post->name;
        $this->description = $post->description;
        $this->oldPhoto = $post->cover;
        $this->rooms = $post->rooms;
        $this->bedrooms = $post->bedrooms;
        $this->floor = $post->floor;
        $this->surface = $post->surface;
        $this->price = $post->price;
        $this->user_id = $post->user_id;
        $this->city = $post->city;
        $this->address = $post->address;
        $this->sold = $post->sold;
        $this->categories = $post->categories->pluck('id');
    }
    public function store()
    {
        $data = $this->validate();
        if ($this->cover && !$this->cover->getError())
        {
            $data['cover'] = $this->cover->store('posts','public');
        }
        $post = Post::create($data);
        $post->categories()->sync($data['categories']);
    }
    public function update()
    {
        $data = $this->validate();
        if($this->cover && !$this->cover->getError()){
            if($this->oldPhoto){
                Storage::disk('public')->delete(paths: $this->oldPhoto);
            }
            $data['cover']=$this->cover->store('posts','public');

        }else{
            $data['cover'] = $this->oldPhoto;
        }
        $this->post->update($data);
        $this->post->categories()->sync($data['categories']);
    }
}
