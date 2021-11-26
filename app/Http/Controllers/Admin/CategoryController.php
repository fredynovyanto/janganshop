<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('dashboards.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();

        if($request->file('image')){
            $image_path = $request->file('image')->store('category_images', 'public');
        }
        $name = $request->get('name');
        $description = $request->get('description');
        $category->name = $name;
        $category->slug = Str::slug($name);
        $category->description = $description;
        $category->status = $request->get('status') == TRUE ? '1' : '0';
        $category->popular = $request->get('popular') == TRUE ? '1' : '0';
        $category->image = $image_path;
        $category->meta_title = $name;
        $category->meta_description = Str::limit($description, 50);
        $category->meta_keyword = $name;
        $category->save();
        return redirect()->route('categories.index')->with('status', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboards.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboards.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $name = $request->get('name');

        if($request->file('image')){
            if($category->image && file_exists(storage_path('app/public/'.$category->image))){
                Storage::delete('public/'.$category->image);
            }
            $new_image = $request->file('image')->store('category_images', 'public');
            $category->image = $new_image;
        }
        $category->name = $name;
        $category->slug = Str::slug($name);
        $category->description = $request->get('description');
        $category->status = $request->get('status') == TRUE ? '1' : '0';
        $category->popular = $request->get('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->get('meta_title');
        $category->meta_description = $request->get('meta_description');
        $category->meta_keyword = $request->get('meta_keyword');
        $category->save();
        return redirect()->route('categories.index', [$category])->with('status', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete('public/'.$category->image);
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category successfully deleted');
    }

    public function ajaxSearch(Request $request){
        
        $categories = [];
        $keyword = $request->get('q');
        $categories = Category::where("name", "LIKE", "%$keyword%")->get();

        return response()->json($categories);
    }
}
