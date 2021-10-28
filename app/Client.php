<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{

    protected $table = 'visitors';
    public $timestamps = true;
    protected $fillable = array('phone', 'e_mail', 'password', 'name', 'date_of_birth', 'blood_type_id', 'city_id', 'pin_code');

    public function bloodTypes()
    {
        return $this->belongsToMany('App\BloodType','blood_type_visitor');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post','post_visitor');
    }

    public function donationRequests()
    {
        return $this->belongsToMany('App\DonationRequest');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Governorate','state_visitor');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\BloodType');
    }

        public function tokens()
        {
            return $this->hasMany('App\Token');
        }



    protected $hidden = [
       'password', 'api_token',
    ];
    public function favorites()
    {
      return $this->belongsToMany('App\Favorite');
    }
}
