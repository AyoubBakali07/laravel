<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

// New route for fetching products
Route::get('/products', function () {
    return response()->json(Product::all());
});