<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", "client_id", "ent_id", "serie", "status", "cp", "state", "location", "address"];

    public function client(){
      return $this->belongsTo('App\Client', 'client_id', 'client_id');
    }
}
