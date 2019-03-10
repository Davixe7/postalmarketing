<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
  
  public function index(Request $request){
    $postal_code = $request->postal_code;
    $products    = Product::where('postal_code', $postal_code)->with('client')->limit(5)->get();
    return response()->json( ['data'=>$products] );
  }

  public function update(Request $request, $id)
  {
    //
  }
}
