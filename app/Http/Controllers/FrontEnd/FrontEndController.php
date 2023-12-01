<?php

namespace App\Http\Controllers\FrontEnd;

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
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\GuitarEffectsCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Pagination\LengthAwarePaginator;

class FrontEndController extends Controller
{
    public function index()
    {
        $categories = Category::where('status','1')->get();
        $products = Product::where('trending', '1')->paginate(10);
        $total_trending = Product::where('trending','1')->count();
        $brands = Brands::where('status','1')->get();
        $slider = Slider::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.frontEndIndex', compact('slider','categories','products','brands','total_trending','accessCategories','stringsCategory','gEffectsCat'));
    }

    public function viewProducts($category_id)
    {
        $category = Category::where('slug', $category_id)->first();
        if($category)
        {
            $brands = Brands::where('status','1')->get();
            $categories = Category::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.products.viewProducts',compact('categories','category','brands','category_id','accessCategories','stringsCategory','gEffectsCat'));
        }else{
            return redirect()->back();
        }

    }

    public function viewBrands($brand_id)
    {
        $guitars = Product::where('brand', $brand_id)->where('status', '1')->get();
        $gears = Gear::where('brand', $brand_id)->where('status', '1')->get();
        $strings = Strings::where('brand', $brand_id)->where('status', '1')->get();
        $guitarEffects = GuitarEffects::where('brand', $brand_id)->where('status', '1')->get();

        $products = $guitars->concat($gears)->concat($strings)->concat($guitarEffects)->paginate(15);

        if($products)
        {
            $brands = Brands::where('status','1')->get();
            $categories = Category::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.brands.viewBrands',compact('categories','products','brands','brand_id','accessCategories','stringsCategory','strings','gEffectsCat'));
        }
        
     
    }

    public function viewGear($gear_id)
    {
        $accessoryCategory = AccessoryCategory::where('slug', $gear_id)->first();
        if($accessoryCategory)
        {
            $brands = Brands::where('status','1')->get();
            $categories = Category::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.gearProducts.accessoryIndex',compact('categories','brands','gear_id','accessoryCategory','accessCategories','stringsCategory','gEffectsCat'));
        }else{
            return redirect()->back();
        }

    }

    public function viewAllAccessory()
    {
        $allAccessory = Gear::where('status', '1')->paginate(10);
        $brands = Brands::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.gearProducts.allAccessoryIndex', compact('categories','allAccessory','brands','accessCategories','stringsCategory','gEffectsCat'));
    }
    

    public function viewGearString($string_id)
    {
        $stringCat = StringCategory::where('slug', $string_id)->first();
        if($stringCat)
        {
            $brands = Brands::where('status','1')->get();
            $categories = Category::where('status','1')->get();
            $stringProd = $stringCat->stringProducts()->paginate(15);
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.gearProducts.stringIndex', compact('categories','stringProd','brands','string_id','stringCat','accessCategories','stringsCategory','gEffectsCat'));
        }else{
            return redirect()->back();
        }
    }

    public function viewAllStrings()
    {
        $strings = Strings::where('status', '1')->paginate(15);
        $brands = Brands::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.gearProducts.allStringIndex', compact('categories','strings','brands','accessCategories','stringsCategory','gEffectsCat'));
    }

    public function viewGuitarEffects($gEffects_id)
    {
        $guitarEffectsCategory = GuitarEffectsCategory::where('slug', $gEffects_id)->first();
        if($guitarEffectsCategory)
        {
            $brands = Brands::where('status','1')->get();
            $categories = Category::where('status','1')->get();
            $guitarEffectsProd = $guitarEffectsCategory->guitarEffectsProducts()->where('status', '1')->paginate(15);
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.gearProducts.guitarEffectsIndex', compact('categories','guitarEffectsProd','brands','guitarEffectsCategory','accessCategories','stringsCategory','gEffectsCat'));
        }
    }

    public function viewAllGuitarEffects()
    {
        $allGuitarEffects = GuitarEffects::where('status', '1')->paginate(15);
        $brands = Brands::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.gearProducts.allGuitarEffectsIndex', compact('categories','allGuitarEffects','brands','accessCategories','stringsCategory','gEffectsCat'));
    }

    public function newProductIndex()
    {
        $newGuitar = Product::latest()->take(5)->where('status', '1')->get();
        $newAccessory = Gear::latest()->take(5)->where('status', '1')->get();
        $newString = Strings::latest()->take(5)->where('status', '1')->get();
        $newGuitarEffects = GuitarEffects::latest()->take(5)->where('status', '1')->get();

        $newProducts = $newGuitar->concat($newAccessory)->concat($newString)->concat($newGuitarEffects)->paginate(10);

        if($newProducts)
        {
            $categories = Category::where('status','1')->get();
            $total_trending = Product::where('trending','1')->count();
            $brands = Brands::where('status','1')->get();
            $slider = Slider::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.newProducts.newProductsIndex', compact('newProducts','slider','categories','brands','total_trending','accessCategories','stringsCategory','gEffectsCat'));
        }

       
    }

    public function searchProducts(Request $request)
    {
        $search = $request->input('searchInput');
        if($search)
        {
            $categories = Category::where('status','1')->get();
            $total_trending = Product::where('trending','1')->count();
            $brands = Brands::where('status','1')->get();
            $slider = Slider::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 

            $searchGuitar = Product::where('product_name', 'like', '%' . $search . '%')
                                        ->orWhere('description', 'like', '%' .$search. '%')
                                        ->orWhere('brand', 'like', '%' .$search. '%')
                                        ->orWhere('small_description', 'like', '%' .$search. '%')
                                        ->orWhereHas('category', function ($query) use ($search) {
                                            $query->where('name', 'like', '%' . $search . '%');
                                        })->get();
            $searchAccessory = Gear::where('accessory_name', 'like', '%' . $search . '%')
                                        ->orWhere('description', 'like', '%' .$search. '%')
                                        ->orWhere('brand', 'like', '%' .$search. '%')
                                        ->orWhere('small_description', 'like', '%' .$search. '%')
                                        ->orWhereHas('gearCategory', function ($query) use ($search) {
                                            $query->where('accessory_category_name', 'like', '%' . $search . '%');
                                        })->get();
            $searchString = Strings::where('string_name', 'like', '%' . $search . '%')
                                        ->orWhere('description', 'like', '%' .$search. '%')
                                        ->orWhere('brand', 'like', '%' .$search. '%')
                                        ->orWhere('small_description', 'like', '%' .$search. '%')->get();
            $searchGuitarEffects = GuitarEffects::where('guitar_effects_name', 'like', '%' . $search . '%')
                                        ->orWhere('description', 'like', '%' .$search. '%')
                                        ->orWhere('brand', 'like', '%' .$search. '%')
                                        ->orWhere('small_description', 'like', '%' .$search. '%')
                                        ->orWhere('guitarEffectsCategory', 'like', '%' .$search. '%')->get();

            $searchProducts = $searchGuitar->concat($searchAccessory)->concat($searchString)->concat($searchGuitarEffects)->paginate(15);
            return view('frontend.searchProduct.searchProductIndex', compact('search','searchProducts','slider','categories','brands','total_trending','accessCategories','stringsCategory','gEffectsCat'));
        }else{
            Alert::info('Empty Search');
            return redirect()->back();
        }
    }
}
