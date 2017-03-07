<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Ulepsava putanje  
// https://github.com/cviebrock/eloquent-sluggable#configuration
//https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel/learn/v4/questions/1856294
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Post extends Model
{

//Ulepsava putanje
use Sluggable;
use SluggableScopeHelpers;





public function sluggable() {
        return [
            'slug' => [
                'source'         => 'title',
                'separator'      => '-',
                'includeTrashed' => true,
            ]
        ];
    }



    protected $fillable = [

    'title',
    'body',
    'category_id',
    'photo_id'



    ];




public function user()
{
	return	$this->belongsTo('App\User');
}







public function photo()
{		
	return $this->belongsTo('App\Photo');
}




public function category()
{
	return	$this->belongsTo('App\Category');
}






public function comments()
{
	return $this->hasMany('App\Comment');
}



}
