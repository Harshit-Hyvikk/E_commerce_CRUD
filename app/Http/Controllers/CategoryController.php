<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view("allcategory", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addcategory");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Validator::make($request->all(), [
            "cname" => "required|string|max:255",
        ]);
        $category = Category::create([
            "name" => $request->cname,
            "slug" => Str::slug($request->cname),
        ]);
        // return $category;
        if ($category) {
            return redirect()->route('allcategories.index')->with("success", "Category added successfully!");
        } else {
            return redirect()->route('allcategories.index')->with("error", "Error, Category not added. Try again!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
