<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserFollowsEventTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_follows_event', function(Blueprint $table)
		{
			$table->foreign('event_id', 'fk_user_has_event_event1')->references('id')->on('event')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_user_has_event_user1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_follows_event', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_has_event_event1');
			$table->dropForeign('fk_user_has_event_user1');
		});
	}
}
