<?php

use Illuminate\Database\Migrations\Migration;

class AddNamesToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($t){
			$t->string('first_name', 64);
			$t->string('last_name', 64);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($t){
			$t->dropColumn('first_name');
			$t->dropColumn('last_name');
		});	
	}

}