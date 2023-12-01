<?php

namespace App\Http\Livewire\FrontEnd\Products;

use Livewire\Component;

class ViewBrands extends Component
{ 
    private $products, $brands, $brand_id;
    public function mount($products, $brands, $brand_id)
    {
        $this->products = $products;
        $this->brands = $brands;
        $this->brand_id = $brand_id;
    }
    public function render()
    {
        return view('livewire.front-end.products.view-brands',[
            'products' => $this->products,
            'brands' => $this->brands,
            'brand_id' => $this->brand_id,
        ]);
    }
}
