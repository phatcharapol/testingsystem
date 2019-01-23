<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeaccess', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subjectcode');
            $table->string('subjectname');
            $table->string('regis_email');
            $table->string('regis_name');
            $table->string('owner_subject');
            $table->dateTime('join_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codeaccess');
    }
}
