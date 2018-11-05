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

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client)
    {
        return view('clients.single', ["client"=>$client]);
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }

    public function import(Request $req){
      $file = $req->file("xls");
      $filename = $file->getClientOriginalName();
      $r1 = \Storage::disk('archivos')->put($filename, \File::get( $file ));

      if( $r1 ){
        Excel::import(new ClientsImport, $filename);
      }
      return redirect()->route('clients.index');
    }
}
