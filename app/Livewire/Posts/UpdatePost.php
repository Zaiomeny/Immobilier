<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

class UpdatePost extends Component
{
    use WithFileUploads;
    public PostForm $postForm;

    public function mount(Post $post)
    {
        $this->postForm->setPost($post);
    }
    public function save()
    {
        $this->postForm->update();
        $this->postForm->reset();
        $this->redirect(route('posts.index'),true);
    }
    #[Computed]
    public function categories()
    {
        return Category::all();
    }
    public function render()
    {
        $this->authorize('update',$this->postForm->post);
        return view('livewire.posts.update-post');
    }
}
