<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return Inertia::render('TestPage',['products' => $products]);
    }
    public function store(request $request){
        $request->validate([
            'name' =>'required',
            'description'=>'required',
            'quantity'=>'required|numeric'
        ]);
    
        $product = Product::create($request->only('name', 'description', 'quantity'));
        return back()->with('success', 'Product created!')->with('product', $product);

    }
}
