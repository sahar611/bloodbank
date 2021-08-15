<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'hospital_name', 'hospital_address', 'patient_age', 'bages_num', 'notes', 'longitude', 'latitude','city_id', 'blood_type_id', 'client_id');

    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function BloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function Client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function Notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}