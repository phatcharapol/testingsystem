<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuestionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_question_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SeqChoice');
            $table->string('ChoiceDetail');
            $table->integer('Score') ;
            $table->timestamps();
            $table->string('created_by') ;
            $table->string('updated_by') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_question_details');
    }
}
