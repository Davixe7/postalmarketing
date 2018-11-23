<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    protected $fillable = ['cadete_id', 'date', 'status_id'];

    public function cadete(){
      return $this->belongsTo('App\Cadete');
    }

    public function collects(){
      return $this->hasMany('App\Collect');
    }
}
