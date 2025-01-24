<?php
namespace App\Repositories;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements  ProductRepositoryInterface {
    public function all() {
        return Product::all();
    }
    public function find($id){
        return Product::findOrFail($id);
    }
    public function create(array $data){
        return Product::create($data);
    }
    public function update($id, array $data){
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }
    public function delete($id){
        return Product::destroy($id);
    }
    // public function delete($id)
    // {
    //     $product = $this->find($id);
    //     return $product->delete();
    // }
}
?>