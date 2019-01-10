<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
            'firstname'=>'Admin',
            'lastname'=>'admin',
            'email'=>'admin@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'1',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ],
            [
            'firstname'=>'Teacher',
            'lastname'=>'Teacher',
            'email'=>'teacher@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'2',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ]
        ]);

    }
}
