<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\Brands;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Strings;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\GuitarEffects;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Models\GuitarEffectsCategory;

class ViewProductController extends Controller
{
    public function viewGuitarProducts($product_slug)
    {   
        $guitarProducts = Product::where('slug', $product_slug)->first();
        if($guitarProducts)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            
            return view('frontend.viewProducts.viewGuitarProducts', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','guitarProducts'));
        }
       
    }

    public function viewAccessoryProducts($accessory_slug)
    {
        $accessoryProduct = Gear::where('slug', $accessory_slug)->first();
        if($accessoryProduct)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            
            return view('frontend.viewProducts.viewAccessoryProducts', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','accessoryProduct'));
        }
    }

    public function viewStringProducts($string_slug)
    {
        $stringProduct = Strings::where('slug', $string_slug)->first();
        if($stringProduct)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            
            return view('frontend.viewProducts.viewStringProducts', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','stringProduct'));
        }
    }

    public function viewGuitarEffectsProducts($guitarE_slug)
    {
        $guitarEffectsProducts = GuitarEffects::where('slug', $guitarE_slug)->first();
        if($guitarEffectsProducts)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            
            return view('frontend.viewProducts.viewGuitarEffectsProducts', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','guitarEffectsProducts'));
        }
    }
}
