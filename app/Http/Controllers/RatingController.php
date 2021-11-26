<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $product_rating = $request->get('product_rating');
        $product_id = $request->get('product_id');
        $product_review = $request->get('review');
        
        $product_check = Product::where('id', $product_id)->first();
        if($product_check)
        {
            $verified = Order::where('orders.user_id', Auth::id())
                    ->join('order_items', 'orders.id', 'order_items.order_id')
                    ->where('order_items.product_id', $product_id)->get();
            if($verified){
                $rating = new Rating();
                $rating->user_id = Auth::id();
                $rating->product_id = $product_id;
                $rating->rating = $product_rating;
                $rating->review = $product_review;
                $rating->save();
                
                Alert::toast('Thank you for rating this product', 'success')->autoClose(3000)->hideCloseButton();
                return redirect()->back();
            }else{
                Alert::toast('You cannot rate this product', 'error')->autoClose(3000)->hideCloseButton();
                return redirect()->back();
            }
        }
        else
        {
            Alert::toast('You cannot rate this product', 'error')->autoClose(3000)->hideCloseButton();
            return redirect()->back();
        }
    }
}
