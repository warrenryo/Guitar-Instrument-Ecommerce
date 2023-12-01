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

class TrackOrderController extends Controller
{
    public function trackOrderIndex()
    {
        $categories = Category::where('status','1')->get();
        $products = Product::where('trending', '1')->paginate(10);
        $total_trending = Product::where('trending','1')->count();
        $brands = Brands::where('status','1')->get();
        $slider = Slider::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.trackOrder.trackOrderIndex', compact('slider','categories','products','brands','total_trending','accessCategories','stringsCategory','gEffectsCat'));
    }

    public function getTrackOrder(Request $request)
    {
        $submittedNumber = $request->input('trackOrder');

        $trackOrder = Orders::where('tracking_number', $submittedNumber)->first();

        if($trackOrder)
        {
            $totalPrice = 0;
            $totalPrice2 = 0;
            return view('frontend.trackOrder.viewOrderTracked', compact('trackOrder','totalPrice','totalPrice2'));
        }else{
            Alert::error('No Order Found');
            return redirect()->back();
        }


    }
}
