<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'f_link', 'i_link', 't_link', 'y_link', 'about_app', 'notification_setting_text');

}