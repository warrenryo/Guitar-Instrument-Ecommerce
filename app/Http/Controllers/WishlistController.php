<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use Illuminate\Support\Facades\Auth;
use App\Models\GuitarEffectsCategory;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{
    //ADD PRODUCT TO CART
    public function addWishlist(Request $request, $product_id)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_slug', $product_id)->exists())
            {
                Alert::warning('Product Already Exist', 'This product is already on the Cart');
                return redirect()->back();
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_slug' => $product_id,
                    'quantity' => $request['quantity']
                ]);
                Alert::success('Product Added to Cart');
                return redirect()->back();
            }
        }
        else
        {
            Alert::info('Login First','Please Login first or Create an Account');
            return redirect()->back();
        }
    }

    //ADD ACCESSORY/STRINGS TO CART
    public function addAccessoryCart(Request $request, $accessory_id)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_slug', $accessory_id)->exists())
            {
                Alert::warning('Product Already Exist', 'This product is already on the Cart');
                return redirect()->back();
            }else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_slug' => $accessory_id,
                    'quantity' => $request['quantity'],
                    'size' => $request['size']
                ]);
                Alert::success('Product Added to Cart');
                return redirect()->back();
            }
        }else{
            Alert::info('Login First','Please Login first or Create an Account');
            return redirect()->back();
        }
    }

    public function showCart()
    {
        $categories = Category::where('status','1')->get();
        $products = Product::where('trending', '1')->paginate(10);
        $total_trending = Product::where('trending','1')->count();
        $brands = Brands::where('status','1')->get();
        $slider = Slider::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('frontend.cart.showCart', compact('slider','categories','products','brands','total_trending','accessCategories','stringsCategory','gEffectsCat'));
    }

    public function deleteCart(Request $request)
    {
        $cart_id = $request->input('deleteCart');

        $deleteCart = Wishlist::find($cart_id);
        $deleteCart->delete();

        return redirect()->back();
    }


}
