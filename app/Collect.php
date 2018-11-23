<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $fillable = ['workload_id','product_id','confirmed','status_id', 'date'];

    public function workload(){
      return $this->belongsTo('App\Workload');
    }

    public function product(){
      return $this->belongsTo('App\Product');
    }
}
