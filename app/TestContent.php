<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestContent extends Model
{
    //
    protected $fillable = ['id','name','subject_id','created_by','updated_by'];

    public function TestSubject(){
    	return $this->belongsTo('App\TestSubject','id');
    }
    public function TestQuestions(){
    	return $this->hasMany('App\TestQuestion','content_id');
    }
}
