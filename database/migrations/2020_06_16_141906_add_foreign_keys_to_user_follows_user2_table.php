<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserFollowsUser2Table extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_follows_user2', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_user_has_user2_user1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('followed_user_id', 'fk_user_has_user2_user2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_follows_user2', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_has_user2_user1');
			$table->dropForeign('fk_user_has_user2_user2');
		});
	}
}
