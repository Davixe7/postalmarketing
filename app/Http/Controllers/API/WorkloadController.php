<?php

namespace App\Http\Controllers\API;

use App\Workload;
use App\Collect;
use App\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\CollectCreated;

class WorkloadController extends Controller
{
  public function index()
  {
    $workloads = Workload::all();
    return response()->json( $workloads );
  }

  public function store(Request $request)
  {
    $data = $request->data;

    if( $data ){
      $products = ($data["products"]) ? $data["products"] : null;

      if( $products ){
        $workload = Workload::create([
          'cadete_id' => $data["cadete_id"],
          'status_id' => 0,
          'date'      => '2018-05-07'
        ]);

        foreach( $products as $p ){
          if( Product::where('idd', '=', $p)->exists() ){
            $collect = Collect::create([
              'workload_id' => $workload->id,
              'product_id'  => $p,
              'date'        => '2018-05-07'
            ]);
            event( new CollectCreated( $collect ) );
          }
        }

        return response()->json( ["data"=>Workload::with('collects.product')->where('id', $workload->id)->get() ] );
      }
    }
  }

  public function show(Workload $workload)
  {
    return response()->json( $workload->with(['collects.product.client'])->get() );
  }
}
