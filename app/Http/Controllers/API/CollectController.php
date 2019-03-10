<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Collect;
use App\Events\CollectStatusUpdated;

class CollectController extends Controller
{
  public function index(){
    $collects = Collect::with('confirmationRequests')->get();
    return response()->json( $collects );
  }

  public function show(Collect $collect)
  {
    return response()->json( $collect );
  }

  public function update(Request $request, Collect $collect)
  {
    $collect->status_id = $request->status_id;
    $collect->save();

    event( new CollectStatusUpdated( $collect ) );
  }

}
