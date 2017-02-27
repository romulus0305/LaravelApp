<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    

protected $fillable = ['path'];


//ne sme da ti bude naziv variable path ili mozda cak naziv koji je u $fillable 
protected $dir ='/images/'; 





public function getPathAttribute($photo)
{
	
	
	return $this->dir . $photo;
}







public function post()
{
	return $this->hasOne('App\Post');
}



public function user()
{
	return $this->hasOne('App\User');
}


























}
