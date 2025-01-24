<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository{
    public function getAll(){
        return Product::all();
    }
    public function create($request){
        Product::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
        ]);
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
    }
}

?>