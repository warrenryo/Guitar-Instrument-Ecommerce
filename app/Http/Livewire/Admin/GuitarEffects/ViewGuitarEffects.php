<?php

namespace App\Http\Livewire\Admin\GuitarEffects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GuitarEffects;

class ViewGuitarEffects extends Component
{
    use WithPagination;
    public function render()
    {
        $guitarEffects = GuitarEffects::orderBy('id','DESC')->paginate(15);
        return view('livewire.admin.guitar-effects.view-guitar-effects', compact('guitarEffects'));
    }
}
