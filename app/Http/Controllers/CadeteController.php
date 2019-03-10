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

  public function show(Cadete $cadete){
    return view('cadetes.single', ["cadete"=>$cadete]);
  }

  public function upload(Request $request)
  {
    return view('cadetes.upload');
  }

  public function import(Request $request){
    $request->validate([
      'xls' => 'mimes:xls,xlsx|required'
    ]);

    $file       = $request->file("xls");
    $filename   = $file->getClientOriginalName();
    $savedFile  = \Storage::disk('archivos')->put($filename, \File::get( $file ));

    if( $savedFile ){
      try {
        Excel::import(new CadetesImport, $filename);
      } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
      }
      $errors = session()->pull('validation.errors');
    }
    return view('cadetes.upload', ['errors'=>$errors]);
  }
}
