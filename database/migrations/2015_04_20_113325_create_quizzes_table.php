<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('lesson_id')->unsigned()->index();
			$table->text('question');
			$table->text('answer');
			$table->string('false_answer1');
			$table->string('false_answer2');
			$table->string('false_answer3');
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
		Schema::drop('quizzes');
	}

}
