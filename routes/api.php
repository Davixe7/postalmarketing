<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
  'productos' => 'API\ProductController',
  'workloads' => 'API\WorkloadController',
  'collects' => 'API\CollectController',
  'confirmation-requests' => 'API\ConfirmationRequestController'
]);
