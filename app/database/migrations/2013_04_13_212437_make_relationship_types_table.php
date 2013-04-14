<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRelationshipTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationship_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 24);
			$table->string('plural_name', 24);
			$table->boolean('active');
			$table->boolean('mutual');
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
		Schema::drop('relationship_types');
	}

}
