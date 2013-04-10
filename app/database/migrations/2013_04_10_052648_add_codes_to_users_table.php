<?php

use Illuminate\Database\Migrations\Migration;

class AddCodesToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
			$table->string('activation_code')->nullable();
			$table->string('reset_password_code')->nullable();
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
			$table->dropColumn('activation_code');
			$table->dropColumn('reset_password_code');
		});
	}

}