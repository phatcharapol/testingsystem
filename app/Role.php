<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['id','name','created_by','updated_by'];

    public function User(){
        return $this->hasMany('App\User','role_id') ;
    }
}
