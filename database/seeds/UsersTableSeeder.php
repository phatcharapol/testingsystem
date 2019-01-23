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
            'firstname'=>'teacher1',
            'lastname'=>'teacher1',
            'email'=>'teacher1@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'2',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ],
            [
            'firstname'=>'teacher2',
            'lastname'=>'teacher2',
            'email'=>'teacher2@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'2',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ],
            [
            'firstname'=>'teacher3',
            'lastname'=>'teacher3',
            'email'=>'teacher3@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'2',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ],
            [
            'firstname'=>'teacher4',
            'lastname'=>'teacher4',
            'email'=>'teacher4@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'2',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ],
            [
            'firstname'=>'Student',
            'lastname'=>'Student',
            'email'=>'student@email.com',
            'password'=>bcrypt('password'),
            'role_id'=>'3',
            'group_access'=>'777',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by'=>'System',
            'updated_by'=>'System'
            ]
        ]);

    }
}
