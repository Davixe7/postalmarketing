<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadete extends Model
{
    protected $fillable = ["cadete_id", "name", "lastname_1", "lastname_2", "email", "status", "gender"];

    public function workloads(){
      return $this->hasMany('App\Workload');
    }
}
