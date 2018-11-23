<?php

namespace App\Http\Controllers;

use App\Workload;
use Illuminate\Http\Request;

class WorkloadController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Workload $workload)
    {
      return view('workloads.single', ['workload'=>$workload ]);
    }

    public function edit(Workload $workload)
    {
        //
    }

    public function update(Request $request, Workload $workload)
    {
        //
    }

    public function destroy(Workload $workload)
    {
        //
    }
}
