<?php

use Illuminate\Database\Migrations\Migration;

class AddIpToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
			$table->integer('registro_IP');
			$table->integer('last_IP');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table) {
			$table->dropColumn('registro_IP');
			$table->dropColumn('last_IP');
		});
	}

}