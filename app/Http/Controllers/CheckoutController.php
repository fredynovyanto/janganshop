<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        foreach($carts as $cart)
        {
            if(!Product::where('id', $cart->product_id)->where('qty', '>=', $cart->quantity)->exists()){
                $remove_item = Cart::where('user_id', Auth::id())->where('product_id', $cart->product_id)->first();
                $remove_item->delete();
            }
        }
        $checkout = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('checkout'));
    }

    public function order(CheckoutRequest $request)
    {
        $order_item = Cart::where('user_id', Auth::id())->get();
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->get('fname');
        $order->lname = $request->get('lname');
        $order->email = Auth::user()->email;
        $order->phone = $request->get('phone');
        $order->address = $request->get('address');
        $order->city = $request->get('city');
        $order->state = $request->get('state');
        $order->country = $request->get('country');
        $order->pincode = $request->get('code');
        $order->payment_mode = $request->get('payment_mode');
        $order->payment_id = $request->get('payment_id');
        
        //menghitung total harga
        $total = 0;
        foreach($order_item as $p)
        {
            $total += $p->product->selling_price * $p->quantity;
        }
        $order->total_price = $total;
        $order->tracking_no = 'js'.rand(1111, 9999);
        $order->save();

        
        foreach($order_item as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->quantity,
                'price' => $item->product->selling_price,
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->qty = $product->qty - $item->quantity;
            $product->update();
        }

        $order_item = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($order_item);

        if($request->get('payment_mode') == "Paid by Razorpay" || $request->get('payment_mode') == "Paid by Paypal"){
            return response()->json(['status' => 'Product Successfully Ordered']);
        }
        Alert::toast('Product Successfully Ordered', 'success')->autoClose(3000)->hideCloseButton();
        return redirect()->route('landing');
    }

    public function userOrder(Request $request)
    {
        $status = $request->get('status');
        if($status)
        {
            $orders = Order::user()->where('status', $status)->get();
        }else
        {
            $orders = Order::user()->where('status', 'process')->get();
        }
        return view('frontend.orders.index', compact('orders'));
    }

    public function orderAccepted(Order $order)
    {
        $order->status = 'completed';
        $order->update();
        Alert::toast('You have received the order', 'success')->autoClose(3000)->hideCloseButton();
        return redirect()->route('my-orders');
    }

    public function view($id)
    {
        $order = Order::user()->findOrFail($id);
        return view('frontend.orders.detail', compact('order'));
    }

    public function razorpayOrder(CheckoutRequest $request)
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($carts as $cart)
        {
            $total_price += $cart->product->selling_price * $cart->quantity;
        }
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $email = Auth::user()->email;
        $phone = $request->get('phone');
        $address = $request->get('address');
        $city = $request->get('city');
        $state = $request->get('state');
        $country = $request->get('country');
        $code = $request->get('code');

        return response()->json([
            'fname'=> $fname,
            'lname'=> $lname,
            'email' => $email,
            'phone'=> $phone,
            'address'=> $address,
            'city'=> $city,
            'state'=> $state,
            'country'=> $country,
            'code'=> $code,
            'total_price' => $total_price,
        ]);
    }
}
