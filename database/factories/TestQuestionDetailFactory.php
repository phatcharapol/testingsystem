<?php

use Faker\Generator as Faker;

$factory->define(App\TestQuestionDetail::class, function (Faker $faker,array $list_arr) {
    return [
        'SeqChoice' => $list_arr['SeqChoice'],
        'ChoiceDetail' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'Score' => $list_arr['Score'],
        'question_id' => $list_arr['question_id'],
        'subject_id' => App\TestQuestion::find($list_arr['question_id'])->subject_id,
        'content_id' => App\TestQuestion::find($list_arr['question_id'])->content_id,
        'created_by'=>'System',
        'updated_by'=>'System'

    ];
});
