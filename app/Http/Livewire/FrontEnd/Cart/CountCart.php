<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use Livewire\Component;
use App\Models\Wishlist;

class CountCart extends Component
{
    public function render()
    {
        $cartCount = Wishlist::where('user_id', auth()->user()->id)->count();
        return view('livewire.front-end.cart.count-cart', compact('cartCount'));
    }
}
