<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('due_date');
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
        Schema::dropIfExists('test_contents');
    }
}
