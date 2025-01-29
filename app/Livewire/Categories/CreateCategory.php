<?php

namespace App\Livewire\Categories;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;

class CreateCategory extends Component
{
   public CategoryForm $categoryForm;

    public function store()
    {
        // dd($this->validate());
        $this->categoryForm->store();
        $this->categoryForm->reset();
        $this->dispatch('categoryCreated');
    }

    public function render()
    {
        return view('livewire.categories.create-category');
    }
}
