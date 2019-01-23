<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    //
     protected $fillable = ['id','user_id','subject_id','content_id','scores','timestamp'];
}
