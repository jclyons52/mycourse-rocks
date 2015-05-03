<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::table('links', function(Blueprint $table)
        {
            $table->text('text');
            $table->text('image');
            $table->text('title');
            $table->string('canonicalUrl', 300);
            $table->text('iframe');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}