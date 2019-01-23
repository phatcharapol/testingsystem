<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$factory->define(App\CodeAccess::class, function (Faker $faker,array $user) {
	 	$code_ran=rand(1,5) ;
        $subjectcode = array("1"=>"SC0001","2"=>"MU0001","3"=>"MA0001","4"=>"EN0001","5"=>"AR0001") ;
        $subjectname=array("1"=>"SCIENCE","2"=>"MUSIC","3"=>"MATH","4"=>"ENGLISH","5"=>"ARTS") ;
        $test_subject=DB::table('test_subjects')->where('subjectcode',$subjectcode[$code_ran])->first() ;
    return [
        //
        'subjectcode'=>$subjectcode[$code_ran],
    	'subjectname'=>$subjectname[$code_ran],
    	'regis_email' => $user['regis_email'],
    	'regis_name' => $user['regis_name'], 
    	'owner_subject' => $test_subject->created_by,
    	'join_at'=> Carbon::now()
    ];
});
