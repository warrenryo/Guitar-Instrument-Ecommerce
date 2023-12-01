<?php

namespace App\Http\Livewire\Admin\Accessory;

use App\Models\Gear;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAccessory extends Component
{
    use WithPagination;
    public function render()
    {
        $accessory = Gear::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.accessory.view-accessory',compact('accessory'));
    }
}
