<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $carts = Cart::with('product')->where('user_id', Auth::id())->get();
            return view('frontend.cart', compact('carts'));
        }
    }

    public function cartCount()
    {
        $count = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $count]);
    }

    public function addToCart(Request $request)
    {
        $product_id = $request->get('product_id');
        $product_qty = $request->get('product_qty');

        if(Auth::check()){
            $product_check = Product::where('id', $product_id)->first();

            if($product_check){
                if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['warning' => $product_check->name." Already added to cart"]);
                }if($product_check->qty == 0 || $product_check->qty < $product_qty)
                {
                    return response()->json(['error' => $product_check->name." out of stock"]);
                }else{
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->product_id = $product_id;
                    if($product_qty == 0){
                        $cart->quantity = 1;
                    }else{
                        $cart->quantity = $product_qty;
                    }
                    $cart->save();
                    if($item = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first()){
                        $item->delete();
                    }
                    
                    return response()->json(['status' => $product_check->name." Added to cart"]);
                }
            }
        }
        else{
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function update(Request $request)
    {
        $product_id = $request->get('product_id');
        $product_qty = $request->get('product_qty');

        if(Auth::check()){
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $item = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $item->quantity = $product_qty;
                $item->update();
                return response()->json(['status' => "Quantity has been updated"]);
            }
        }
    }

    public function delete(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->get('product_id');
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $item = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $item->delete();
                return response()->json(['status' => "Product has been successfully removed from cart"]);
            }
        }
        else{
            return response()->json(['status' => "Login to continue"]);
        }
    }

}
