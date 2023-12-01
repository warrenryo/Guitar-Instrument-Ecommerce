<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrdersController extends Controller
{
    public function viewOrder($order_id)
    {
        $orderInfo = Orders::where('id',$order_id)->first();
        if($orderInfo)
        {
            $totalPrice = 0;
            $totalPrice2 = 0;
            return view('admin.orders.orderView', compact('orderInfo','totalPrice','totalPrice2'));
        }else
        {
            Alert::info('No Orders Found');
            return redirect()->back();
        }
        
    }

    public function changeStatus(Request $request, $order_id)
    {
        $status = Orders::find($order_id);

        $status->status = $request->input('status');
        $status->update();

        Alert::success('Success', 'Status Changed');
        return redirect()->back();
    }

    public function approveAll(Request $request)
    {
        $approveStatus = $request->input('status');

        Orders::query()->update(['status' => $approveStatus]);

        Alert::success('Success', 'Status Changed');
        return redirect()->back();
    }
}
