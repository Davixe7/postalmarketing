<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmationRequest extends Model
{
  protected $fillable = ['collect_id', 'type', 'confirmation_status_id'];

  public function collect(){
    return $this->belongsTo('App\Collect');
  }
}
