<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifiction extends Model 
{

    protected $table = 'notifactions';
    public $timestamps = true;
    protected $fillable = array('donation_request_id', 'title', 'content', 'is_read');

    public function donationRequest()
    {
        return $this->belongsTo('App\DonationRequest');
    }

}
