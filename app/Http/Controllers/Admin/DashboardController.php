<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function viewOrders()
    {
        return view('admin.orders.orderIndex');
    }

    public function viewPendingOrders()
    {
        return view('admin.orders.pendingOrders',);
    }

    public function viewOrderPlaced()
    {
        return view('admin.orders.orderPlaced');
    }
}
