<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $fillable = ['workload_id','client_id','confirmed','status_id'];

    public function workload(){
      return $this->belongsTo('App\Workload');
    }

    public function client(){
      return $this->belongsTo('App\Client');
    }
}
