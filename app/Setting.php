<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notifaction', 'setting_text', 'about_app','whats_link', 'phone', 'email', 'fb_link', 't_link');

}
