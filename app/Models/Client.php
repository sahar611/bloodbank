<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'email', 'password', 'blood_type_id', 'date_of_birth', 'last_donation_date', 'city_id', 'pin_code');

    public function BloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function Posts()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }

    public function Notifications()
    {
        return $this->morphedByMany('App\Models\Notification', 'clientable');
    }

    public function Governorates()
    {
        return $this->morphedByMany('App\Models\Governorate', 'clientable');
    }

    public function BloodTypeClintable()
    {
        return $this->morphedByMany('App\Models\BloodType', 'clientable');
    }
    protected $hidden = [
        'password','api_token',
    ];

}