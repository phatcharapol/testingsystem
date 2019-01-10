<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','role_id','created_by','updated_by','email_verified_at','remember_token'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role') ;
    }

    public function isAdmin(){
        if($this->role->id == 1){
            return true ;
        }
        return false ;
    }
    public function isTeacher(){
        if($this->role->id == 2){
            return true ;
        }
        return false ;
    }
    public function isStudent(){
        if($this->role->id == 3){
            return true ;
        }
        return false ;
    }
    public function setPasswordAttribute($password){
        if(!empty($password))
        return $this->attributes['password'] = bcrypt($password) ;
    }
 
      

}
