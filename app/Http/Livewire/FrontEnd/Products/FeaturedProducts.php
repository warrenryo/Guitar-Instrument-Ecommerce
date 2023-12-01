<?php

namespace App\Http\Livewire\Frontend\Products;

use Livewire\Component;

class FeaturedProducts extends Component
{
    private $products;

    public function mount($products)
    {
        $this->products = $products;
    }
    public function render()
    {
        return view('livewire.frontend.products.featured-products', [
            'products' => $this->products
        ]);
    }
}
