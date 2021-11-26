<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('dashboards.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        if($request->file('image')){
            $image_path = $request->file('image')->store('product_images', 'public');
        }
        $name = $request->get('name');
        $description = $request->get('description');
        $product->category_id = $request->get('categories');
        $product->name = $name;
        $product->small_description = Str::limit($description, 20, '...');
        $product->description = $description;
        $product->original_price = $request->get('original_price');
        $product->selling_price = $request->get('selling_price');
        $product->image = $image_path;
        $product->qty = $request->get('qty');
        $product->tax = $request->get('tax');
        $product->status = $request->get('status') == TRUE ? '1' : '0';
        $product->trending = $request->get('trending') == TRUE ? '1' : '0';
        $product->meta_title = $name;
        $product->meta_keyword = $name;
        $product->meta_description = $description;
        $product->save();
        
        return redirect()->route('products.index')->with('status', 'Product successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboards.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->file('image')){
            if($product->image && file_exists(storage_path('app/public/'.$product->image))){
                Storage::delete('public/'.$product->image);
            }
            $new_image = $request->file('image')->store('product_images', 'public');
            $product->image = $new_image;
        }
        $name = $request->get('name');
        $description = $request->get('description');
        $product->category_id = $request->get('categories');
        $product->name = $name;
        $product->small_description = Str::limit($description, 20, '...');
        $product->description = $description;
        $product->original_price = $request->get('original_price');
        $product->selling_price = $request->get('selling_price');
        $product->qty = $request->get('qty');
        $product->tax = $request->get('tax');
        $product->status = $request->get('status') == TRUE ? '1' : '0';
        $product->trending = $request->get('trending') == TRUE ? '1' : '0';
        $product->meta_title = $request->get('meta_title');
        $product->meta_keyword = $request->get('meta_keyword');
        $product->meta_description = $request->get('meta_description');
        $product->save();

        return redirect()->route('products.index')->with('status', 'Product successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
