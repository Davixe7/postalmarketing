<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadete extends Model
{
    protected $fillable = ["cadete_id", "name", "email", "status"];

    public function workloads(){
      return $this->hasMany('App\Workload');
    }
}
