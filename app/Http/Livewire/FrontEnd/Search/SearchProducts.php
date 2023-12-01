<?php

namespace App\Http\Livewire\FrontEnd\Search;

use Livewire\Component;

class SearchProducts extends Component
{
    private $searchProducts;

    public function mount($searchProducts)
    {
        $this->searchProducts = $searchProducts;
    }
    public function render()
    {
        return view('livewire.front-end.search.search-products',[
            'searchProducts' => $this->searchProducts
        ]);
    }
}
