<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        // gets products from database and store them in product variable
        $products = Product::all();

        // returns an inertia response with the products array
        return Inertia::render('Test', ['products' => $products]);
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'price' =>'required',
            'Stock' =>'required',
        ]);
        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'Stock' => $request->Stock,
        ]);
        return redirect()->route('test')->with('success', 'Product created successfully.'); // Redirect to the 'test' route

    }
}
