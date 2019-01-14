<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestionDetail extends Model
{
    //
    protected $fillable = ['id','question_title','subject_id','content_id','question_id','ChoiceDetail','SeqChoice','Score','created_by','updated_by'];
    
    public function TestQuestion(){
        return  $this->belongsTo('App\TestQuestion') ;
    }
}
