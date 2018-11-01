<?php

namespace App\Http\Controllers;

use App\Cadete;
use Illuminate\Http\Request;

class CadeteController extends Controller
{
    public function index()
    {
        return view('cadetes.index');
    }

    public function create()
    {
        return view('cadetes.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Cadete $cadete)
    {
        //
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
}
