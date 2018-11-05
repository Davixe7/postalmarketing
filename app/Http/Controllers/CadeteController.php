<?php

namespace App\Http\Controllers;

use App\Cadete;
use Illuminate\Http\Request;
use App\Imports\CadetesImport;
use Excel;

class CadeteController extends Controller
{
  public function index()
  {
    $cadetes = Cadete::where('status', '1')->paginate(200);
    return view('cadetes.index', ["cadetes"=>$cadetes]);
  }

  public function create()
  {
    return view('cadetes.create');
  }

  public function store(Request $request)
  {
    //
  }

  public function show(Cadete $cadete){
    return view('cadetes.single', ["cadete"=>$cadete]);
  }

  public function edit(Cadete $cadete)
  {
    //
  }

  public function update(Request $request, Cadete $cadete)
  {
    //
  }

  public function destroy(Cadete $cadete)
  {
    //
  }

  public function uploud(Request $req)
  {
    return view('cadetes.upload');
  }

  public function import(Request $req){
    $file = $req->file("xls");
    $filename = $file->getClientOriginalName();
    $r1 = \Storage::disk('archivos')->put($filename, \File::get( $file ));

    if( $r1 ){
      Excel::import(new CadetesImport, $filename);
    }
    return redirect()->route('cadetes.index');
  }
}
