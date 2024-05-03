<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        return view();
    }

    public function getProducts(){
        $products = Product::All();
        return view('admin.management.products-data',compact('products'));

    }

    public function createProduct(Request $request){
        $validatedData= $request->validate([
            'famille'=>'required|String',
            'reference'=>'required|String',
            'description'=>'required|String',
            'quantite'=>'required|Numeric',
            'Prix_achat'=>'required|Numeric',
            'Prix_unitaire'=>'required|Numeric',
        ]);
        $newproduct = Product::create($validatedData);
        return redirect()->back();
    }

    public function editProduct(Request $request,$id){
        $validatedData= $request->validate([
            'famille'=>'required|String',
            'reference'=>'required|String',
            'description'=>'required|String',
            'quantite'=>'required|Numeric',
            'Prix_achat'=>'required|Numeric',
            'Prix_unitaire'=>'required|Numeric',
        ]);

        $Product = Product::findOrFail($id);
        $Product->update($validatedData);
        return redirect()->back();
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }
}