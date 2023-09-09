<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('email', 'name', 'phone', 'password', 'date_birth', 'blood_type_id', 'last_date_donation', 'city_id', 'pin_code', 'api_token');
    protected $hidden = array('password', 'api_token');

    public function articales()
    {
        return $this->belongsToMany('App\Models\Articale');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notifications');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }
}
