<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\Review;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $popularProducts = Product::limit(6)->get();
        $categories = Category::paginate(12);
        return view('frontend.index', compact('products', 'popularProducts', 'categories'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';
        $searches = Product::where('name', 'LIKE', "%$keyword%")->paginate(15);
        return view('frontend.search', compact('searches'));
    }

    public function products()
    {
        $products = Product::paginate(15);
        return view('frontend.product', compact('products'));
    }

    public function popularProducts()
    {
        $products = Product::where('trending', 1)->paginate(12);
        return view('frontend.popularProduct', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $rating = Rating::where('product_id', $id)->avg('rating');
        $reviews = Rating::where('product_id', $id)->get();
        return view('frontend.show', compact('product', 'rating', 'reviews'));
    }

    public function showCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->paginate(15);
        return view('frontend.showCategory', compact('products', 'category'));
    }

    public function nav()
    {
        if(Auth::check()){
            $count = Cart::with('product')->where('user_id', Auth::id())->count();
        }
        return view('layouts.frontend._navbar', compact('count'));
    }
    
}
