<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticalClient extends Model 
{

    protected $table = 'atricale_client';
    public $timestamps = true;
    protected $fillable = array('client_id', 'articale_id');

}