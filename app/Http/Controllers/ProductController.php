<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'images'])->paginate(5);
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

        //for dubbing -start
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
        // dubbing -


        $product = Product::create([
            "name" => $request->pname,
            "slug" => Str::slug($request->pname),
            "price" => $request->pprice,
            "description" => $request->pdescroption,
            "category_id" => $request->pcategory,
        ]);


        if ($request->hasfile('pimage')) {
            foreach ($request->file('pimage') as $image) {
                $name = time() . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/upload/ProductImage', $name);
                $product->images()->create(['image_url' => $name]);
                // dd($product);

            }
        }

        if ($product) {
            return redirect()->route('allproduct.index')->with("success", "Product Added Successfully!");
        } else {
            return redirect()->route('allproduct.index')->with("error", "Error, Product not added. Try again!");
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['images', 'category'])->findOrFail($id);
        // return $product->images;
        return view("productdetails", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::with(["images", "category"])->findOrFail($id);
        $categories = Category::all();

        return view("updateproduct", compact(["product", "categories"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $validator = Validator::make($request->all(), [
            "pname" => "required|string|max:255",
            "pprice" => "required|numeric",
            "pdescription" => "required|string",
            "pcategory" => "required|string",
            "pimage" => "required|array",
            'pimage.*' => "image|mimes:png,jpg,jpeg,gif",
        ]);

        $product = Product::with('images')->findOrFail($id);
        foreach ($product->images as $image) {
            $file_path = public_path("upload/ProductImage/") . $image->image_url;
            if (file_exists($file_path)) {
                @unlink($file_path);
            }
            $image->delete();
        }
        // dd($validator);

        $product->where('id', $id)->update([
            "name" => $request->pname,
            "slug" => Str::slug($request->pname),
            "price" => $request->pprice,
            "description" => $request->pdescroption,
            "category_id" => $request->pcategory,
        ]);

        if ($request->hasfile('pimage')) {
            foreach ($request->file('pimage') as $image) {
                $name = time() . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/upload/ProductImage', $name);
                $product->images()->create(['image_url' => $name]);
                // dd($product);

            }
        }

        return redirect()->route('allproduct.update', $id)->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);


        foreach ($product->images as $image) {
            $imagePath = public_path() . '/upload/ProductImage/' . $image->image_url;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();
        return redirect()->route('allproduct.index')->with('success', 'Product Delete Successfully!');
    }
}
