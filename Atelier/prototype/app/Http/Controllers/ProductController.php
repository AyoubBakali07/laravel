<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
// use Validator;
use Illuminate\Support\Facades\Validator; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $ProductRepository;
    public function __construct(ProductRepository $productRepository){
        $this->ProductRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->ProductRepository->getAll();
        return view('products.index', compact('products'));
        // return view('welcome', compact('products'));

        // $products = Product::withTrashed()->get();
        // return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "name"=>"required|string|max:255",
                "description"=>"required|string|max:255",
            ]
            );
            $this->ProductRepository->create($request);
            return redirect()->route('products.index')
            ->with('success','Product Added successfully');
    //     $validator = Validator::make($request->all(),[
    //         'name'=>'required',
    //     ]);
    //    if ($validator->fails())
    //    {
    //     return response()->json([
    //         'status' =>400,
    //         'errors' =>$validator->messages(),
    //     ]);
    //    }
    //    else{
    //     $product = new Product();
    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->save();

    //     return redirect()->route('products.index')
    //     ->with('success','Product Added successfully');
    //    }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     //
    // }
    public function show(string  $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ProductRepository->delete($id);
        return response()->json(['success' => true]);
        // $product = Product::findOrFail($id);
        // $product->delete();
        // try {
        //     $product = Product::findOrFail($id);
        //     $product->delete();
            
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Product deleted successfully'
        //     ]);
            
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Error deleting product: ' . $e->getMessage()
        //     ], 500);
        // }

    }
}
