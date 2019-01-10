<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTestQuestionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_question_details', function (Blueprint $table) {
            //
            $table->integer('subject_id')->unsigned();
            $table->integer('content_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('test_subjects')->onDelete('cascade');
            $table->foreign('content_id')->references('id')->on('test_contents')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('test_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_question_details', function (Blueprint $table) {
            //
        });
    }
}
