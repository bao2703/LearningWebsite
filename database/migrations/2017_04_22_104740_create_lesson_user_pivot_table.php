<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('lesson_user', function (Blueprint $table) {
		    $table->primary(['lesson_id', 'user_id']);
		    $table->integer('lesson_id')->unsigned();
		    $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		    $table->longText('user_process')->nullable();
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('lesson_user');
    }
}
