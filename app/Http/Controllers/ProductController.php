<?php

namespace App\Http\Controllers;

use App\Product;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Excel;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(200);
        return view("products.index", ["products"=>$products]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }

    public function import(Request $req){
      $file = $req->file("xls");
      $filename = $file->getClientOriginalName();
      $r1 = \Storage::disk('archivos')->put($filename, \File::get( $file ));

      if( $r1 ){
        Excel::import(new ProductsImport, $filename);
      }
      return redirect()->route('products.index');
    }
}
