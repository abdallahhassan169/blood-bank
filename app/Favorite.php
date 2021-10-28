<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  public function clients()
  {
    return $this belongsToMany('App/Client');


  }
}
