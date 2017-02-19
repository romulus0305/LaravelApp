<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','role_id','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];





public function role()
{
    return $this->belongsTo('App\Role');
}









public function photo()
{


    return $this->belongsTo('App\Photo');


}


       

// Ne valja 
//Trying to get property of non-object greska kada je u tabeli users role_id = null
public function isAdmin()
{
    if (!$this->role->name == "administrator") {
        return "pusi ga";
    }
    return false;
}
















}
