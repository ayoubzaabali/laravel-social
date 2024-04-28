<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserHasInterestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_has_interests', function(Blueprint $table)
		{
			$table->foreign('interest_id', 'interest_fk')->references('id')->on('interests')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'user_fk')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_has_interests', function(Blueprint $table)
		{
			$table->dropForeign('interest_fk');
			$table->dropForeign('user_fk');
		});
	}
}
