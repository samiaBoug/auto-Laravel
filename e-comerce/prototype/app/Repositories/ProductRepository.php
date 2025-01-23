<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function paginate()
    {
        return Product::paginate(10);
    }

    public function create($request){
       return Product::create([
            "name"=> $request->input("name"),
            "description"=> $request->input("description"),
            "price" => $request->input("price")
        ]);
    }
    public function delete($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
    }
}
