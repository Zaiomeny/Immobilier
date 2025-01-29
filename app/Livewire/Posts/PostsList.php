<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Service\Table_traits\Sortable;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;
    use Sortable;

    public $search ='';
    protected $queryString =[
        'search' => ['except' => ''],
    ];
    public function updatedSearch(): void
    {
        $this->resetPage();
    }
    public function delete(Post $post): void
    {
        $this->authorize('delete',$post);

        if($post->cover){
            Storage::disk('public')->delete($post->cover);
        }
        $post->delete();
    }
    #[Computed()]
    public function posts()
    {
        return Post::where('name', 'LIKE',"%{$this->search}%")
                    ->where('user_id',currentUser()->id)
                    ->orderBy($this->orderField, $this->orderDirection)
                    ->with(['categories'])
                    ->paginate(5);
    }
    #[On('postCreated')]
    public function render()
    {
        return view(
            'livewire.posts.posts-list'
        );
    }
}
