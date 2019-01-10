<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSubject extends Model
{
    //
       protected $fillable = ['id','name','created_by','updated_by'];

       protected $observables = ['created','updated'];
      
      public function TestContents(){
      		return $this->hasMany('App\TestContent','subject_id') ;
      }
}

