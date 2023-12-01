<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use Livewire\Component;
use App\Models\Wishlist;

class ShowCart extends Component
{
    public $totalPrice = 0, $totalPrice2 = 0;
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.front-end.cart.show-cart', compact('wishlist'));
    }

    public function decrementQuantity($cart_id)
    {
        $cartData = Wishlist::where('id', $cart_id)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            $cartData->decrement('quantity');
        }else{
            Alert::error('Error', 'Something went wrong');
        }
    }

    public function incrementQuantity($cart_id)
    {
        $cartData2 = Wishlist::where('id', $cart_id)->where('user_id', auth()->user()->id)->first();
        if($cartData2)
        {
            $cartData2->increment('quantity');
        }else
        {
            Alert::error('Error', 'Something went wrong');
        }
    }
}
