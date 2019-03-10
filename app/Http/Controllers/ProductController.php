<?php

namespace App\Http\Controllers;

use App\Product;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Excel;

class ProductController extends Controller
{

  public function index(){
    $products = Product::paginate(200);
    return view("products.index", ["products"=>$products]);
  }

  public function import(Request $request){
    $request->validate([
      'xls' => 'mimes:xls,xlsx|required'
    ]);

    $file      = $request->file("xls");
    $filename  = $file->getClientOriginalName();
    $savedFile = \Storage::disk('archivos')->put($filename, \File::get( $file ));

    if( $savedFile ){
      try {
        Excel::import(new ProductsImport, $filename);
      } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
      }
      $errors = session()->pull('validation.errors');
    }
    return view('products.upload', ['errors'=>$errors]);
  }
}
