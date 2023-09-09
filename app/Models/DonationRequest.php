<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('client_id', 'name', 'age', 'blood_type_id', 'num_bags', 'hospital', 'address_hospital', 'city_id', 'phone', 'latitude', 'longitude', 'notes');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notifications');
    }
}
