<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Orders;
use Livewire\Component;
use Illuminate\Http\Request;

class PendingOrders extends Component
{
    public function render(Request $request)
    {
        $pendingOrders = Orders::where('status', 'Pending')
                                ->when($request->search, function($q) use($request){
                                    $q->where(function($q2) use($request){
                                        $q2->where('tracking_number', 'like', '%'. $request->search. '%')
                                            ->orWhere('firstName', 'like', '%'. $request->search. '%')
                                            ->orWhere('lastName', 'like', '%'. $request->search. '%')
                                            ->orWhere('contactInfo', 'like', '%'. $request->search. '%');
                                    });
                                })
                                ->paginate(10);
        return view('livewire.admin.orders.pending-orders', compact('pendingOrders'));
    }
}
