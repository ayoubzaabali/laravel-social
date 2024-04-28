<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowsEventTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_follows_event', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_user_has_event_user1_idx');
			$table->integer('event_id')->index('fk_user_has_event_event1_idx');
			$table->primary(['user_id','event_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_follows_event');
	}
}
