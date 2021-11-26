<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('status')->paginate(10);
        return view('dashboards.orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        return view('dashboards.orders.show', compact('order'));
    }
    public function update(Request $request, Order $order)
    {
        $order->status = $request->get('status');
        $order->update();
        Alert::toast('Order successfully updated', 'success')->autoClose(3000)->hideCloseButton();
        return redirect()->route('orders.index');
    }
}
