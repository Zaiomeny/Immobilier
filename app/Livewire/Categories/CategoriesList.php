<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Service\Table_traits\Sortable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesList extends Component
{
    use WithPagination;
    use Sortable;
    public $editId = 0;

    #[Url()]
    public $search;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }
    public function setEditId($id): void
    {
        $this->editId = $id;
    }
    #[On('categoryUpdated')]
    public function resetId():void
    {
        $this->reset(['editId']);
    }
    public function delete(Category $category): void
    {
        $category->delete();
    }
    #[Computed]
    public function categories()
    {
        return Category::where('name','LIKE',"%$this->search%")
                        ->orderBy($this->orderField, $this->orderDirection)
                        ->paginate(4);
    }
    #[On('categoryCreated')]
    public function render()
    {
        return view('livewire.categories.categories-list');
    }
}
