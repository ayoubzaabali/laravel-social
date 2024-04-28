<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowsUser2Table extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_follows_user2', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_user_has_user2_user1_idx');
			$table->integer('followed_user_id')->index('fk_user_has_user2_user2_idx');
			$table->primary(['user_id','followed_user_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_follows_user2');
	}
}
