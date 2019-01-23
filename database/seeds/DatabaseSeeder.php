<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TestSubjectTableSeeder::class);
        $this->call(TestContentTableSeeder::class);
        
        $testquestion=factory(App\TestQuestion::class,20)->create()->each(function ($Tq){
            $correct_choice=rand(1,4) ;
            $choice = array("1"=>0,"2"=>0,"3"=>0,"4"=>0) ;
            $choice[$correct_choice] =1 ;
            for($i=1 ;$i<=4 ;$i++){
                factory(App\TestQuestionDetail::class,1)->create(['question_id'=>$Tq->id,'SeqChoice'=>$i,'Score'=>$choice[$i]]);
            }
        });

        $user=factory(App\User::class,30)->create()->each(function ($user){
             factory(App\CodeAccess::class,1)->create(['regis_email'=>$user->email,'regis_name'=>$user->firstname." ".$user->lastname]);
        });

    }
}
