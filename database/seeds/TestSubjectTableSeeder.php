<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_subjects')->insert([
            ['subjectcode'=>'SC0001','name'=>'SCIENCE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'teacher1 teacher1','updated_by'=>'teacher1 teacher1'],
            ['subjectcode'=>'MU0001','name'=>'MUSIC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'teacher2 teacher2','updated_by'=>'teacher2 teacher2'],
            ['subjectcode'=>'MA0001','name'=>'MATH', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'teacher3 teacher3','updated_by'=>'teacher3 teacher3'],
            ['subjectcode'=>'EN0001','name'=>'ENGLISH', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'teacher1 teacher1','updated_by'=>'teacher1 teacher1'],
            ['subjectcode'=>'AR0001','name'=>'ARTS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'teacher3 teacher3','updated_by'=>'teacher3 teacher3']
        ]);
       
    }
}
