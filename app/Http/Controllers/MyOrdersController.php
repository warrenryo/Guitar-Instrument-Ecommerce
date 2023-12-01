<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Orders;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Models\GuitarEffectsCategory;
use RealRashid\SweetAlert\Facades\Alert;

class MyOrdersController extends Controller
{
    public function myOrders()
    {
        $categories = Category::where('status','1')->get();
        $products = Product::where('trending', '1')->paginate(10);
        $total_trending = Product::where('trending','1')->count();
        $brands = Brands::where('status','1')->get();
        $slider = Slider::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.myOrders.myOrdersIndex', compact('slider','categories','products','brands','total_trending','accessCategories','stringsCategory','gEffectsCat'));
    }

    public function viewMyOrders($order_id)
    {
        $orderInfo = Orders::where('user_id', auth()->user()->id)->where('id', $order_id)->first();
        if($orderInfo)
        {
            $categories = Category::where('status','1')->get();
            $products = Product::where('trending', '1')->paginate(10);
            $total_trending = Product::where('trending','1')->count();
            $brands = Brands::where('status','1')->get();
            $slider = Slider::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            $totalPrice = 0;
            $totalPrice2 = 0;
            return view('frontend.myOrders.viewMyOrders', compact('slider','categories','products','brands','total_trending','accessCategories','stringsCategory','gEffectsCat','totalPrice','totalPrice2','orderInfo'));
        }
        else
        {
            Alert::info('No Orders Found');
            return redirect()->back();
        }
    }
}
