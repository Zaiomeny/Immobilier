<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

class CreatePosts extends Component
{
    use WithFileUploads;
    public PostForm $postForm;
    public function mount():void
    {
        $this->postForm->user_id = currentUser()->id;
    }
    #[Computed]
    public function categories()
    {
        return Category::all();
    }
    public function store() : void
    {
        $this->postForm->store();
        $this->postForm->reset();
        $this->dispatch('postCreated');
    }
    public function render() : View
    {
        return view('livewire.posts.create-posts');
    }
}
