<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Gear;
use App\Models\Brands;
use App\Models\Orders;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Strings;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\CartOrders;
use Illuminate\Http\Request;
use App\Models\GuitarEffects;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GuitarEffectsCategory;
use App\Http\Requests\OrdersFormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BuyProductsController extends Controller
{
    public function buyGuitars($product_slug)
    {
        $guitarProducts = Product::where('slug', $product_slug)->first();
        if($guitarProducts)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.buyGuitarIndex', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','guitarProducts'));
        }
        
    }

    public function buyAccessories($accessory_slug)
    {
        $accessoryProducts = Gear::where('slug', $accessory_slug)->first();
        if($accessoryProducts)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.buyAccessoriesIndex', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','accessoryProducts'));
        }
    }

    //for GUITARS
    public function checkout(Request $request)
    {
        $randomNumbers = mt_rand(100000000,999999999);
        if($this->trackingNumberExists($randomNumbers))
        {
            $randomNumbers = mt_rand(100000000,999999999);
        }

        $user_id = Auth::user()->id;

        $orders = new Orders;
        $orders->tracking_number = $randomNumbers;
        $orders->user_id = $user_id;
        $orders->firstName = $request['firstName'];
        $orders->lastName = $request['lastName'];
        $orders->company = $request['company'];
        $orders->address = $request['address'];
        $orders->apartment = $request['apartment'];
        $orders->postalCode = $request['postalCode'];
        $orders->city = $request['city'];
        $orders->phoneNumber = $request['phoneNumber'];
        $orders->contactInfo = $request['contactInfo'];
        $orders->delivery_method = $request['delivery_method'];
        $orders->payment_method = $request['payment_method'];
        $orders->status = $request['status'];

        $orders->save();

        $cart = Wishlist::where('user_id', auth()->user()->id)->get();

        foreach($cart as $itemData)
        {
            $cartOrderData = [
                'order_id' => $orders->id,
                'user_id' => $itemData->user_id,
                'product_slug' => $itemData->product_slug,
                'quantity' => $itemData->quantity,
                'size' => $itemData->size  
            ];

            $orders->cartOrders()->create($cartOrderData);
        }

        Wishlist::where('user_id', auth()->user()->id)->delete();

        return redirect()->route('order.summary', ['order_id' => $orders->id]);
    }

    public function trackingNumberExists($randomNumbers)
    {
        return Orders::whereTrackingNumber($randomNumbers)->exists();
    }


    //CHECKOUT STRINGS
    public function buyStrings($string_slug)
    {
        $stringProducts = Strings::where('slug', $string_slug)->first();
        if($stringProducts)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.buyStringIndex', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','stringProducts'));
        }
    }

    //CHECKOUT GUITAR EFFECTS
    public function buyGuitarEffects($guitarE_slug)
    {
        $guitarEffectsProducts = GuitarEffects::where('slug', $guitarE_slug)->first();
        if($guitarEffectsProducts)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.buyGuitarEffectsIndex', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','guitarEffectsProducts'));
        }
    }

    public function checkoutCart($user_id)
    {
        $cart = Wishlist::where('user_id', $user_id)->first();
        if($cart)
        {
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 

            $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
            $totalPrice = 0;
            $totalPrice2 = 0;
            return view('frontend.buyProducts.checkoutCartIndex', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','wishlist','totalPrice','totalPrice2'));
        }
    }

    public function buyOneProduct(Request $request, $product_slug)
    {
        $buyOneProduct = Product::where('slug', $product_slug)->first();
        if($buyOneProduct)
        {
            $quantity = $request->input('quantity');
            $total = 0;
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.viewBuyOneProduct', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','buyOneProduct','quantity','total'));
        }

    }

    public function buyOneAccessory(Request $request, $accessory_slug)
    {

        $buyOneAccessory = Gear::where('slug', $accessory_slug)->first();
        if($buyOneAccessory)
        {
            $quantity = $request->input('quantity');
            $total = 0;
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.viewBuyOneAccessory', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','buyOneAccessory','quantity','total'));
        }
    }

    public function buyOneString(Request $request, $string_slug)
    {

        $buyOneString = Strings::where('slug', $string_slug)->first();
        if($buyOneString)
        {
            $quantity = $request->input('quantity');
            $stringSize = $request->input('stringSize');
            $total = 0;
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.viewBuyOneString', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','buyOneString','quantity','total','stringSize'));
        }
    }

    public function buyOneGuitarEffects(Request $request, $guitarEffects_slug)
    {

        $buyOneGuitarEffects = GuitarEffects::where('slug', $guitarEffects_slug)->first();
        if($buyOneGuitarEffects)
        {
            $quantity = $request->input('quantity');
            $total = 0;
            $categories = Category::where('status','1')->get();
            $brands = Brands::where('status','1')->get();
            $accessCategories = AccessoryCategory::where('status','1')->get();
            $stringsCategory = StringCategory::where('status', '1')->get();
            $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
            return view('frontend.buyProducts.viewBuyOneGuitarEffects', compact('categories','brands','accessCategories','stringsCategory','gEffectsCat','buyOneGuitarEffects','quantity','total'));
        }
    }

    public function oneOrder(Request $request)
    {
        $randomNumbers = mt_rand(100000000,999999999);
        if($this->trackingNumberExists($randomNumbers))
        {
            $randomNumbers = mt_rand(100000000,999999999);
        }

        $oneOrder = new Orders;
        $oneOrder->tracking_number = $randomNumbers;
        $oneOrder->user_id = $request['user_id'];
        $oneOrder->firstName = $request['firstName'];
        $oneOrder->lastName = $request['lastName'];
        $oneOrder->company = $request['company'];
        $oneOrder->address = $request['address'];
        $oneOrder->apartment = $request['apartment'];
        $oneOrder->postalCode = $request['postalCode'];
        $oneOrder->city = $request['city'];
        $oneOrder->phoneNumber = $request['phoneNumber'];
        $oneOrder->contactInfo = $request['contactInfo'];
        $oneOrder->delivery_method = $request['delivery_method'];
        $oneOrder->payment_method = $request['payment_method'];
        $oneOrder->status = $request['status'];
        $oneOrder->save();

        $productOrder = [
            'order_id' => $oneOrder->id,
            'user_id' => $request->input('user_id'),
            'product_slug' => $request->input('product_slug'),
            'quantity' => $request->input('quantity'),
            'size' => $request->input('size')
        ];

        $oneOrder->cartOrders()->create($productOrder);
        $totalPrice = 0;
        $totalPrice2 = 0;

        return redirect()->route('orderSummary', ['order_id' => $oneOrder->id]);
    }

    //ONE ORDER PRODUCT
    public function showOrderSummary($order_id)
    {
        $orderSummary = Orders::find($order_id);
        $totalPrice = 0;
        $totalPrice2 = 0;
        
        return view('frontend.orderSummary.orderSummaryProduct', compact('orderSummary', 'totalPrice', 'totalPrice2'));
    }

    //CART ORDER PRODUCT
    public function viewOrderSummary($order_id)
    {
        $orderSummary = Orders::find($order_id);
        $totalPrice = 0;
        $totalPrice2 = 0;
        
        return view('frontend.orderSummary.orderSummaryProduct', compact('orderSummary', 'totalPrice', 'totalPrice2'));
    }
}
