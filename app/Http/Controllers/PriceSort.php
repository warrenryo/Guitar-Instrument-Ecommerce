<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Models\GuitarEffectsCategory;

class PriceSort extends Controller
{
    public function priceSort(Request $request)
    {
        $product = Product::query();

        if($request->has('sort'))
        {
            $sort = $request->input('sort');

            if($sort === 'price_asc')
            {
                $product->orderBy('sale_price', 'ASC');
            }elseif ($sort === 'price_desc')
            {
                $product->orderBy('sale_price', 'DESC');
            }
        }

        $sortProduct = $product->get();
        $categories = Category::where('status','1')->get();
        $total_trending = Product::where('trending','1')->count();
        $brands = Brands::where('status','1')->get();
        $slider = Slider::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 

        return view('frontend.products.viewProducts', [
            'sortProduct' => $sortProduct,
            'selectedSort' => $sort ?? null,
            'categories' => $categories,
            'total_trending' => $total_trending,
            'brands' => $brands,
            'slider' => $slider,
            'accessCategories' => $accessCategories,
            'stringCategory' => $stringsCategory,
            'gEffectsCat' => $gEffectsCat
        ]);
    }
}
