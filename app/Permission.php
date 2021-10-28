<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

        protected $table = 'permissions';
        public $timestamps = true;
        protected $fillable = array('name', 'guard_name');
        public function permissions()
        {
          $this->belongsToMany('App\Role');

        }
}
