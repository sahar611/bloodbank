<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'body', 'category_id');
    protected $appends=array('is_favourite');
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }
    public function getIsFavouriteAttribute(){
        $favourite=request()->user()->whereHas('posts',function($query){
        $query->where('client_id',$this->id); 
    })->first();
        if($favourite)
        {
            return true;
        }
        return false;
    }

}