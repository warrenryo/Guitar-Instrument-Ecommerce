<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brands;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $product_name, $brand_id;

    public function render()
    {
        $brands = Brands::all();
        $categories = Category::all();
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.products.product-index', compact('products','categories','brands'));
    }
}
