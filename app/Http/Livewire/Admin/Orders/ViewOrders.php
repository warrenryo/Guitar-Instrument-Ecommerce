<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Orders;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ViewOrders extends Component
{
    public function render(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Orders::when($request->date, function($q) use($request){
                                return $q->whereDate('created_at', $request->date);
                            }, function($q) use($todayDate){
                                return $q->whereDate('created_at', $todayDate);
                            })
                            ->when($request->status, function($q) use($request){
                                return $q->where('status', $request->status);
                            })
                            ->get();
        return view('livewire.admin.orders.view-orders', compact('orders','todayDate'));
    }
}
