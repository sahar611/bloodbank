<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'body', 'category_id');

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function Clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

}