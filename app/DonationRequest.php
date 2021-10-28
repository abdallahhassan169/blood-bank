<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donations';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'city_id', 'hospital_name', 'blood_kind_id', 'patient_age', 'hospital_address', 'details', 'latitude', 'longitude', 'client_id');

    public function notifaction()
    {
        return $this->hasOne('App\Notifaction');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

  public function blood_kind()
  {
    return $this->belongsTo('App\BloodType');
  }
    public function city()
    {
        return $this->belongsTo('App\City');
    }


}
