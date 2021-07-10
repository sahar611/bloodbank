<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notification_text', 'about_app', 'phone', 'email', 'fb_link', 'tw_link', 'instgram_link', 'youtube_link');

}