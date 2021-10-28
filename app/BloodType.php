<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BloodType extends Model
{

    protected $table = 'blood_kinds';
    public $timestamps = true;
    protected $fillable = array('name');

    public function notificationClients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function clients()
    {
        return $this->hasMany('App\Client','blood_type_visitor');
    }

}
