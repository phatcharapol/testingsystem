<?php

use Faker\Generator as Faker;

$factory->define(App\TestQuestion::class, function (Faker $faker) {
    $subject_id=$faker->numberBetween(1,5) ;
    $content_id = '' ;
    if($subject_id == 1){
        $content_id = $faker->numberBetween(1,3) ;
    }else if($subject_id == 2){
        $content_id = $faker->numberBetween(4,6) ;
    }else if($subject_id == 3){
        $content_id = $faker->numberBetween(7,9) ;
    }else if($subject_id == 4){
        $content_id = $faker->numberBetween(10,12) ;
    }else{
        $content_id = $faker->numberBetween(13,15) ;
    }
    return [
        'question_title' => $faker->sentence($nbWords = 6, $variableNbWords = true)." ?",
        'subject_id' => $subject_id,
        'content_id' =>  $content_id,
        'created_by'=>'System',
        'updated_by'=>'System'
    ];
});
