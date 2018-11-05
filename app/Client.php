<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["name", "email", "email_2", "address", "cp", "client_id"];

    public function products(){
      return $this->hasMany('App\Product', 'client_id', 'client_id');
    }
}
