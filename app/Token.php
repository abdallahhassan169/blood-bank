<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
  public function client(){
    return $this->belongsto('App\Client');



  }
}
