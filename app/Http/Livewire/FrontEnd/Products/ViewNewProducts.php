<?php

namespace App\Http\Livewire\FrontEnd\Products;

use Livewire\Component;

class ViewNewProducts extends Component
{
    private $newProducts;

    public function mount($newProducts)
    {
        $this->newProducts = $newProducts;
    }
    public function render()
    {
        return view('livewire.front-end.products.view-new-products',[
            'newProducts' => $this->newProducts
        ]);
    }
}
