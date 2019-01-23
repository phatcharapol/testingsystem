<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon ;
class TestContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_contents')->insert([
                [
                    'name'=>'QUIZ I',
                    'subject_id'=>'1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                ],
                [
                    'name'=>'QUIZ II',
                    'subject_id'=>'1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                ],

                [
                    'name'=>'QUIZ III',
                    'subject_id'=>'1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                ],

                [
                    'name'=>'QUIZ I',
                    'subject_id'=>'2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],
                    [
                    'name'=>'QUIZ II',
                    'subject_id'=>'2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],

                    [
                    'name'=>'QUIZ III',
                    'subject_id'=>'2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                ],
                [
                    'name'=>'QUIZ I',
                    'subject_id'=>'3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],
                    [
                    'name'=>'QUIZ II',
                    'subject_id'=>'3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],

                    [
                    'name'=>'QUIZ III',
                    'subject_id'=>'3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],
                [
                    'name'=>'QUIZ I',
                    'subject_id'=>'4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],
                    [
                    'name'=>'QUIZ II',
                    'subject_id'=>'4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],

                    [
                    'name'=>'QUIZ III',
                    'subject_id'=>'4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],
                    [
                    'name'=>'QUIZ I',
                    'subject_id'=>'5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],
                    [
                    'name'=>'QUIZ II',
                    'subject_id'=>'5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],

                    [
                    'name'=>'QUIZ III',
                    'subject_id'=>'5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                    'due_date' => Carbon::now()
                    ],

        ]);
    }
}
