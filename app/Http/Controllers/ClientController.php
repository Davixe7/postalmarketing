<?php

namespace App\Http\Controllers;

use App\Client;
use App\Imports\ClientsImport;
use Illuminate\Http\Request;
use Excel;

class ClientController extends Controller
{
  public function index()
  {
    $clients = Client::paginate(200);
    return view('clients.index', ["clients"=>$clients]);
  }

  public function create()
  {
    return view('clients.create');
  }

  public function show(Client $client)
  {
    return view('clients.single', ["client"=>$client]);
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
        Excel::import(new ClientsImport, $filename);
      } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
      }
      $errors = session()->pull('validation.errors');
    }
    return view('clients.upload', ['errors'=>$errors]);
  }
}
