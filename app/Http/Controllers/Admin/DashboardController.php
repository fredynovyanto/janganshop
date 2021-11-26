<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::count();
        $category = Category::count();
        $order = Order::count();
        $user = User::count();
        return view('dashboards.index', compact('product', 'category', 'order', 'user'));
    }

    public function notifCount()
    {
        $query = Order::where('status', 'process')->where('user_id', Auth::id());
        $count = $query->count();
        $order = $query->get();
        return response()->json(['count' => $count, 'order' => $order]);
    }
}
