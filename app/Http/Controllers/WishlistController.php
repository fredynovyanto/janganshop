<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    public function wishlistCount()
    {
        $count = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $count]);
    }

    public function store(Request $request)
    {
        $product_id = $request->get('product_id');

        if(Auth::check()){
            $product_check = Product::where('id', $product_id)->first();

            if($product_check){
                if(Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['warning' => $product_check->name." Already added to wishlist"]);
                }else{
                    $wishlist = new Wishlist();
                    $wishlist->user_id = Auth::id();
                    $wishlist->product_id = $product_id;
                    $wishlist->save();
    
                    return response()->json(['status' => $product_check->name." Added to wishlist"]);
                }
            }else{
                return response()->json(['status' => $product_check->name." Product doesnot exist"]);
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function destroy(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->get('product_id');
            if(Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $item = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $item->delete();
                return response()->json(['status' => "Product has been successfully removed from wishlist"]);
            }
        }
        else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
}
