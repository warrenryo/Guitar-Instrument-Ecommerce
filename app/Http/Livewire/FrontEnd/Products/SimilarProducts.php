<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class SimilarProducts extends Component
{
    private $products;

    public function render()
    {
        $this->products = Product::all()->shuffle()->paginate(5);
        return view('livewire.frontend.products.similar-products',[
            'products' => $this->products,
        ]);
    }
}
