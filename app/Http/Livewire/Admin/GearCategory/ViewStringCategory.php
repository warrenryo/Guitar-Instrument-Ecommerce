<?php

namespace App\Http\Livewire\Admin\GearCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StringCategory;

class ViewStringCategory extends Component
{
    use WithPagination;
    public function render()
    {
        $stringCategory = StringCategory::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.gear-category.view-string-category', compact('stringCategory'));
    }
}
