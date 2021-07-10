<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function Clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function clientable()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

}