<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonLinkPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lesson_link', function(Blueprint $table)
		{
			$table->integer('lesson_id')->unsigned()->index();
			$table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
			$table->integer('link_id')->unsigned()->index();
			$table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lesson_link');
	}

}
