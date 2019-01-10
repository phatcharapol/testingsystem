<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['name'=>'Administrator', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System'],
            ['name'=>'Teacher', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System'],
            ['name'=>'Student', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),'created_by'=>'System','updated_by'=>'System']
        ]);
    }
}
