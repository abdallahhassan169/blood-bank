<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contact';
    public $timestamps = true;
    protected $fillable = array('f_b_link', 't_link', 'telephone', 'g_mail', 'name','text');

}
