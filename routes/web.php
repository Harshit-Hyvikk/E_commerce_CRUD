<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('/allproduct',ProductController::class);
Route::resource('/allcategories',CategoryController::class);

// Route::view('addProduct', '/AddNewProduct')->name('product.addnew');
