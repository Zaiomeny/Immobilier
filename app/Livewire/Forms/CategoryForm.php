<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?Category $category;

    #[Validate('required|min:4|string')]
    public $name;

    #[Validate('required|min:4|string')]
    public $color;

    public function setCategory(Category $category) : void
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->color = $category->color;
    }
    public function store() : void
    {
        Category::create($this->validate());
    }
    public function update(): void
    {
        $this->validate();
        $this->category->update($this->all());
    }
}
