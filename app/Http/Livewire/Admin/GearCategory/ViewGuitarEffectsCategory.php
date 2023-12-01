<?php

namespace App\Http\Livewire\Admin\GearCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GuitarEffectsCategory;

class ViewGuitarEffectsCategory extends Component
{
    use WithPagination;
    public function render()
    {
        $gEffectsCategory = GuitarEffectsCategory::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.gear-category.view-guitar-effects-category', compact('gEffectsCategory'));
    }
}
