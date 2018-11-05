<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadete extends Model
{
    protected $fillable = ["cadete_id", "name", "email", "status"];

    // public function products(){
    //   return $this->hasMany('App\Product', 'cadete_id', 'cadete_id');
    // }
}
