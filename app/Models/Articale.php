<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{

    protected $table = 'articales';
    public $timestamps = true;
    protected $fillable = array('title', 'category_id', 'image', 'content');

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
