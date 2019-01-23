<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeAccess extends Model
{
    //
    public $table = "codeaccess";
    public $timestamps = false;

     protected $fillable = ['subjectcode','subjectname','regis_email','regis_name','owner_subject','join_at'];
}
