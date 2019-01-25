<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    //
    protected $fillable = ['id','question_title','subject_id','content_id','created_by','updated_by'];

    public function TestContent(){
    	return $this->belongsTo('App\TestContent','id');
    }
    public function TestQuestionDetails(){
        return  $this->hasMany('App\TestQuestionDetail','question_id') ;
    }
    
}
