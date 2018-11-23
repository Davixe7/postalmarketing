<?php

namespace App\Http\Controllers\API;

use App\Workload;
use App\Collect;
use App\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkloadController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
      $data     = json_decode( $request->data );
      if( $data ){
        $products = ($data->products) ? json_decode( $data->products) : null;
        if( $products ){
          $workload = Workload::create([
            'cadete_id' => $data->cadete_id,
            'status_id' => 0,
            'date'      => '2018-05-07'
          ]);

          foreach( $products as $p ){
            if( Product::find($p)->exists() ){
              $collect = Collect::create([
                'workload_id' => $workload->id,
                'product_id'  => $p,
                'date'        => '2018-05-07'
              ]);
            }
          }

          return response()->json( ["data"=>Workload::with('collects.product')->where('id', $workload->id)->get() ] );
        }
      }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
