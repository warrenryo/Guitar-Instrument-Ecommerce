<?php

namespace App\Http\Livewire\Admin\GearCategory;

use Livewire\Component;

class AccessoryCategory extends Component
{
    private $accessoryCat;

    public function mount($accessoryCat)
    {
        $this->accessoryCat = $accessoryCat;
    }
    public function render()
    {

        return view('livewire.admin.gear-category.accessory-category',[
            'accessoryCat' => $this->accessoryCat
        ]);
    }
}
