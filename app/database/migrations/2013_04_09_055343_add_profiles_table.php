<?php

use Illuminate\Database\Migrations\Migration;

class AddProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->date('birthday');
			$table->string('country_id', 2)->index();
			$table->enum('sexo', array('M', 'F'));
			$table->integer('estado_de_vida_id')->unsigned();
			$table->text('biografia');
			$table->string('avtar_file_name');
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
		Schema::drop('profiles');
	}

}