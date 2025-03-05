<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
    
        $products =Product::query();
        $products = $products->latest()->paginate(5);
        return response()->json([
            'products' => $products
        ],200);
    
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->type = $request->type;
        $product->save();
    }
    public function edit($id) {
        $product = Product::find($id);
        return response()->json([
            'product' => $product
        ],200);
    }
    // update 
    // public chj

}
