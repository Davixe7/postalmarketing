<?php

namespace App\Http\Controllers\API;

use App\ConfirmationRequest;
use App\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\CollectStatusUpdated;
use App\Events\CollectStatusUpdateRequested;

class ConfirmationRequestController extends Controller
{
    public function index(){
      $confirmationRequests = ConfirmationRequest::all();
      return response()->json( $confirmationRequests );
    }

    public function store(Request $request)
    {
      $collect             = Collect::findOrFail( $request->collect_id );
      $confirmationRequest = ConfirmationRequest::create([
        'collect_id' => $collect->id,
        'type'       => $request->type
      ]);

      event( new CollectStatusUpdateRequested( $collect, $confirmationRequest->type ) );

      return response()->json( ['data'=>['confirmationRequest'=>$confirmationRequest]] );
    }

    public function update(Request $request, ConfirmationRequest $confirmationRequest)
    {
      $confirmationRequest->update( ["confirmation_status_id" => 1] );

      $collect = $confirmationRequest->collect;
      $collect->update( [ "status_id" => $confirmationRequest->type, "confirmed" => true ] );

      event( new CollectStatusUpdated( $collect ) );
      return response()->json( $confirmationRequest );
    }
}
