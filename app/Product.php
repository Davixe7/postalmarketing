<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["enterprise_id", "serie", "idd", "name", "status", "postal_code", "province", "location", "address", "client_id", "lat", "lng"];

    public function client(){
      return $this->hasOne('App\Client', 'client_id', 'client_id');
    }
}
