<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

      protected $table = 'roles';
      public $timestamps = true;
      protected $fillable = array('name', 'guard_name');
      public function permissions()
      {
        $this->belongsToMany('App\Permission');

      }
}
