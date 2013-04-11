<?php

use Illuminate\Database\Migrations\Migration;

class RemoveTimestampsFromProfileTable extends Migration {

	/**
	 * Run the migrations.	
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profiles', function($table)
		{
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profiles', function($table)
		{
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

}