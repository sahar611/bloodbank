<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function Clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

    public function City()
    {
        return $this->hasMany('App\Models\City');
    }

}