<?php

namespace App\Http\Livewire\FrontEnd\Products;

use App\Models\Product;
use Livewire\Component;

class ViewProducts extends Component
{
    private $products, $categories;
    public $priceSort, $availability,$availability2, $quantityFilter = 0, $category;

    public function mount($category, $categories)
    {
        $this->categories = $categories;
        $this->category = $category;
    }

    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];

    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
        ->when($this->priceSort, function($q){
            $q->when($this->priceSort == 'price_asc', function($q2){
                $q2->orderBy('sale_price', 'asc');
            })
            ->when($this->priceSort == 'price_desc', function($q2){
                $q2->orderBy('sale_price', 'desc');
            })
            ->when($this->priceSort == 'featured', function($q2){
                return $q2;
            });
        })
        ->when($this->availability, function($q){
            $q->when($this->availability == 'instock', function($q2){
                $q2->where('quantity', '>', 0);
            });
        })
        ->when($this->availability2, function($q){
            $q->when($this->availability2 == 'outofstock', function($q2){
                $q2->where('quantity', '<=', 0);
            });
        })
        ->where('status', '1')
        ->paginate(15);

        return view('livewire.front-end.products.view-products', [
            'products' => $this->products,
            'category' => $this->category,
            'categories' => $this->categories,
        ]);
    }
}
