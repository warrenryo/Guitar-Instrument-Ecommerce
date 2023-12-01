<?php

namespace App\Http\Livewire\FrontEnd\MyOrders;

use App\Models\Orders;
use Livewire\Component;

class ShowMyOrders extends Component
{
    public function render()
    {
        $orders = Orders::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('livewire.front-end.my-orders.show-my-orders', compact('orders'));
    }
}
