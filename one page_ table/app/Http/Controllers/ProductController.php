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

}
