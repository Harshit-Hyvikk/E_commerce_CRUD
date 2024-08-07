<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);
        // return $products;
        return view("allproduct", compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("addproduct", compact(["categories"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            "pname" => "required|string|max:255",
            "pprice" => "required|numeric",
            "pdescription" => "required|string",
            "pcategory" => "required|string",
            "pimage" => "required|array",
            'pimage.*' => "image|mimes:png,jpg,jpeg,gif",
        ]);
        // dd($validator);

        // Check if validation fails
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // $request->validate([
        //     $request->pname => "required|string|max:255",
        //     $request->pprice => "required|numeric",
        //     $request->pdescription => "required|string|min:20",
        //     $request->pcategory => "required|string",
        //     $request->pimage => "required|array",
        //     "pimage.*" => "image|mimes:png,jpg,jpeg,gif", // Validate each image

        // ]);

        // dd($request->all());
        // Create the product first
        $product = Product::create([
            "name" => $request->pname,
            "slug" => Str::slug($request->pname),
            "price" => $request->pprice,
            "description" => $request->pdescroption,
            "category_id" => $request->pcategory,
        ]);


        // Handle the image upload and save URLs to the product_images table
        if ($request->hasfile('pimage')) {
            foreach ($request->file('pimage') as $image) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/upload/ProductImage', $name);
                $product->images()->create(['image_url' => $name]);
        // dd($product);

            }
        }

        // Redirect based on the product creation status
        if ($product) {
            return redirect()->route('allproduct.index')->with("success", "Product Added Successfully!");
        } else {
            return redirect()->route('allproduct.index')->with("error", "Error, Product not added. Try again!");
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
