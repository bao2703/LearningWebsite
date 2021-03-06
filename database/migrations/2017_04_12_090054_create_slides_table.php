<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slides', function (Blueprint $table) {
			$table->increments('id');
			$table->string('image')->unique();
			$table->integer('sort_order')->default(1);
			$table->integer('lesson_id')->unsigned();
			$table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
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
		Schema::dropIfExists('slides');
	}
}
