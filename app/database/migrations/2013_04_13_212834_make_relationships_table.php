<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('type_id')->unsigned();
			$table->integer('user_a')->unsigned();
			$table->integer('user_b')->unsigned();
			$table->boolean('accepted');
			$table->timestamps();
			$table->index('type_id');
			$table->index('user_a');
			$table->index('user_b');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relationships');
	}

}
