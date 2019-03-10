<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable      = ["client_id", "name", "email", "postal_code", "province", "location", "address", "lat", "lng", "telephone", "telephone_2"];

    public function products(){
      return $this->hasMany('App\Product', 'client_id', 'client_id');
    }

}
