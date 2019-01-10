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
            ['name'=>'SCIENCE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System'],
            ['name'=>'MUSIC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System'],
            ['name'=>'MATH', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System'],
            ['name'=>'FOREIGN LANGUAGE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System'],
            ['name'=>'ARTS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System']
        ]);

    }
}
