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
                    'name'=>'SCIENCE I',
                    'subject_id'=>'1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                ],
                [
                    'name'=>'SCIENCE II',
                    'subject_id'=>'1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                ],

                [
                    'name'=>'SCIENCE III',
                    'subject_id'=>'1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                ],

                [
                    'name'=>'MUSIC I',
                    'subject_id'=>'2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],
                    [
                    'name'=>'MUSIC II',
                    'subject_id'=>'2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],

                    [
                    'name'=>'MUSIC III',
                    'subject_id'=>'2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                ],
                [
                    'name'=>'MATH I',
                    'subject_id'=>'3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],
                    [
                    'name'=>'MATH II',
                    'subject_id'=>'3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],

                    [
                    'name'=>'MATH III',
                    'subject_id'=>'3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],
                [
                    'name'=>'ENGLISH',
                    'subject_id'=>'4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],
                    [
                    'name'=>'SPAIN',
                    'subject_id'=>'4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],

                    [
                    'name'=>'FRANCE',
                    'subject_id'=>'4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],
                    [
                    'name'=>'ART I',
                    'subject_id'=>'5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],
                    [
                    'name'=>'ART II',
                    'subject_id'=>'5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],

                    [
                    'name'=>'ART III',
                    'subject_id'=>'5',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 'System',
                    'updated_by' => 'System'
                    ],

        ]);
    }
}
