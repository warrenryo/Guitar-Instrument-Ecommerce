<?php

namespace App\Http\Livewire\Admin\String;

use App\Models\Strings;
use Livewire\Component;
use Livewire\WithPagination;

class ViewString extends Component
{

    use WithPagination;
    public function render()
    {
        $strings = Strings::all()->paginate(10); 
        return view('livewire.admin.string.view-string', compact('strings'));
    }
}
